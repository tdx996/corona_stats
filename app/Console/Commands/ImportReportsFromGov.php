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

class ImportReportsFromGov extends Command
{
    protected $signature = 'reports:gov';
    protected $description = 'Import reports from Gov.';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        DB::transaction(function() {
            $this->importFromExcel();
            $this->processReports();
        });
    }

    private function importFromExcel() {
        $this->storeExcel();

        $path = storage_path('app/public/daily_reports.xlsx');
        (new ReportsImport)->import($path, null, \Maatwebsite\Excel\Excel::XLSX);

        $this->info('Excel imported');
    }

    private function storeExcel() {
        $contents = file_get_contents('https://www.gov.si/teme/koronavirus/element/65441/xlsx');
        Storage::put('public/daily_reports.xlsx', $contents);

        $this->info('Excel stored');
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
