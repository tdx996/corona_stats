<?php

namespace App\Console\Commands;

use App\Imports\ReportsImport;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Revolution\Google\Sheets\Facades\Sheets;

class ImportReportsFromApi extends Command
{
    protected $signature = 'reports:api';
    protected $description = 'Import reports from API.';

    protected $recovered = [
        '2020-03-17' => 3,
        '2020-03-18' => 6,
        '2020-03-19' => 18,
        '2020-03-20' => 26,
        '2020-03-21' => 28,
        '2020-03-22' => 32,
        '2020-03-23' => 35,
        '2020-03-24' => 37,
        '2020-03-25' => 42,
        '2020-03-26' => 48,
        '2020-03-27' => 54,
        '2020-03-28' => 54,
        '2020-03-29' => 57,
        '2020-03-30' => 64,
        '2020-03-31' => 72,
        '2020-04-01' => 78,
        '2020-04-02' => 83,
        '2020-04-03' => 93,
        '2020-04-04' => 98,
        '2020-04-05' => 102,
        '2020-04-06' => 115,
        '2020-04-07' => 120,
        '2020-04-08' => 120,
        '2020-04-09' => 128,
        '2020-04-10' => 137,
        '2020-04-11' => 137,
        '2020-04-12' => 137,
        '2020-04-13' => 152,
        '2020-04-14' => 152,
        '2020-04-15' => 152,
        '2020-04-16' => 152,
        '2020-04-17' => 152,
        '2020-04-18' => 152,
    ];

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        DB::transaction(function() {
            $this->deleteOld();
            $this->importFromApi();
            $this->processReports();
        });
    }

    private function deleteOld() {
        Report::query()->delete();

        $this->info('Old reports deleted');
    }

    private function importFromApi() {
        $response = Http::get('https://covid19.rthand.com/api/stats');

        collect($response->json())->each(function ($dailyReport) {
            $reportedAt = Carbon::create($dailyReport['year'], $dailyReport['month'], $dailyReport['day']);

            $report = Report::create([
                'reported_at'        => $reportedAt,
                'new_cases'          => $dailyReport['cases']['confirmedToday'],
                'new_tests'          => $dailyReport['performedTests'],
                'new_deaths'         => $dailyReport['statePerTreatment']['deceased'],
                'total_hospitalized' => $dailyReport['statePerTreatment']['inHospital'] ?? 0,
                'total_critical'     => $dailyReport['statePerTreatment']['inICU'] ?? 0,
                'total_active'       => $dailyReport['cases']['activeToDate'] ?? 0,
                'total_recovered'    => $this->recovered[$reportedAt->format('Y-m-d')] ?? 0,
            ]);

            $this->line("{$report->toJson(JSON_PRETTY_PRINT)}");
        });

        $this->info('Imported from API.');
    }

    private function processReports() {
        Report::all()
            ->each(function (Report $report) {
                $previousReports = Report::query()->where('reported_at', '<=', $report->reported_at)->get();
                $previousReport = $previousReports->where('id', '!=', $report->id)->last();

                $report->update([
                    'total_cases'      => $previousReports->sum('new_cases'),
                    'total_tests'      => $previousReports->sum('new_tests'),
                    'total_deaths'     => $previousReports->sum('new_deaths'),
                    'new_hospitalized' => ($report->total_hospitalized ?? 0) - ($previousReport->total_hospitalized ?? 0),
                    'new_critical'     => ($report->total_critical ?? 0) - ($previousReport->total_critical ?? 0),
                    'new_active'       => ($report->total_active ?? 0) - ($previousReport->total_active ?? 0),
                    'new_recovered'    => ($report->total_recovered ?? 0) - ($previousReport->total_recovered ?? 0),
                ]);
            });

        $this->info('Reports processed');
    }
}
