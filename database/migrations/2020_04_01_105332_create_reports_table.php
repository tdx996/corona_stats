<?php

use App\Imports\ReportsImport;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class CreateReportsTable extends Migration
{
    public function up() {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('new_cases')->nullable();
            $table->integer('new_deaths')->nullable();
            $table->integer('new_hospitalized')->nullable();
            $table->integer('new_intense_care')->nullable();
            $table->integer('new_tests')->nullable();
            $table->integer('total_cases')->default(0);
            $table->integer('total_deaths')->default(0);
            $table->integer('total_hospitalized')->default(0);
            $table->integer('total_intense_care')->default(0);
            $table->integer('total_tests')->default(0);
            $table->timestamp('reported_at')->nullable();
            $table->timestamps();
        });

        Excel::import(new ReportsImport, storage_path('app/public/reports.csv'));

        Report::all()->each(function (Report $report) {
            $previousReports = Report::query()->where('reported_at', '<=', $report->reported_at)->get();
            $report->update([
                'total_cases'           => $previousReports->sum('new_cases'),
                'total_deaths'          => $previousReports->sum('new_deaths'),
                'total_hospitalized'    => $previousReports->sum('new_hospitalized'),
                'total_intense_care'    => $previousReports->sum('new_intense_care'),
                'total_tests' => $previousReports->sum('new_tests'),
            ]);
        });
    }

    public function down() {
        Schema::dropIfExists('reports');
    }
}
