<?php

namespace App\Console\Commands;

use App\Imports\ReportsImport;
use App\Models\Report;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Revolution\Google\Sheets\Facades\Sheets;

class ImportReports extends Command
{
    CONST CSV_PATH = 'app/public/reports.csv';

    protected $signature = 'reports:import';
    protected $description = 'Import reports from CSV.';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        $this->deleteOld();
        $this->importFromCSV();
        $this->processReports();
    }

    private function deleteOld() {
        Report::query()->delete();

        $this->info('Old reports deleted');
    }

    private function importFromCSV() {
        $path = storage_path(self::CSV_PATH);
        Excel::import(new ReportsImport, $path);

        $this->info('CSV imported');
    }

    private function processReports() {
        Report::all()->each(function (Report $report) {
            $previousReports = Report::query()->where('reported_at', '<=', $report->reported_at)->get();
            $report->update([
                'total_cases'        => $previousReports->sum('new_cases'),
                'total_deaths'       => $previousReports->sum('new_deaths'),
                'total_hospitalized' => $previousReports->sum('new_hospitalized'),
                'total_critical' => $previousReports->sum('new_critical'),
                'total_tests'        => $previousReports->sum('new_tests'),
            ]);
        });

        $this->info('Reports processed');
    }
}
