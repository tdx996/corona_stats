<?php

namespace App\Console\Commands;

use App\Imports\ReportsImport;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Revolution\Google\Sheets\Facades\Sheets;

class CreateReports extends Command
{
    protected $signature = 'reports:create';
    protected $description = 'Create a reports CSV from API.';

    protected $recovered = [
        '2020-04-03' => 70,
        '2020-04-04' => 79,
        '2020-04-05' => 79,
    ];

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        DB::transaction(function () {
            $this->deleteOld();
            $this->import();
            $this->processReports();
        });
    }

    private function deleteOld() {
        Report::query()->delete();

        $this->info('Old reports deleted');
    }

    private function import() {
        $response = Http::get('https://covid19.rthand.com/api/stats');
        collect($response->json())->each(function ($dailyReport) {
            $reportedAt = Carbon::create($dailyReport['year'], $dailyReport['month'], $dailyReport['day']);
            Report::create([
                'reported_at'        => $reportedAt,
                'new_cases'          => $dailyReport['cases']['confirmedToday'],
                'new_tests'          => $dailyReport['performedTests'],
                'new_deaths'         => $dailyReport['statePerTreatment']['deceased'],
                'total_hospitalized' => $dailyReport['statePerTreatment']['inHospital'] ?? 0,
                'total_critical'     => $dailyReport['statePerTreatment']['critical'] ?? 0,
                'total_active'       => $dailyReport['cases']['activeToDate'] ?? 0,
                'total_recovered'    => $this->recovered[$reportedAt->format('Y-m-d')] ?? 0,
            ]);
            $this->line("Report({$reportedAt->format('Y-m-d')})");
        });
    }

    private function processReports() {
        Report::all()->each(function (Report $report) {
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
