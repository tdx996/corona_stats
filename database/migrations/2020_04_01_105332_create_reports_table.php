<?php

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    private $attributes = [
        ['new_cases' => 1, 'reported_at' => '2020-03-04'],
        ['new_cases' => 5, 'reported_at' => '2020-03-05'],
        ['new_cases' => 2, 'reported_at' => '2020-03-06'],
        ['new_cases' => 4, 'reported_at' => '2020-03-07'],
        ['new_cases' => 4, 'reported_at' => '2020-03-08'],
        ['new_cases' => 9, 'reported_at' => '2020-03-09'],
        ['new_cases' => 9, 'reported_at' => '2020-03-10'],
        ['new_cases' => 23, 'reported_at' => '2020-03-11'],
        ['new_cases' => 32, 'reported_at' => '2020-03-12'],
        ['new_cases' => 52, 'reported_at' => '2020-03-13'],
        ['new_cases' => 40, 'new_deaths' => 1, 'reported_at' => '2020-03-14'],
        ['new_cases' => 38, 'reported_at' => '2020-03-15'],
        ['new_cases' => 34, 'reported_at' => '2020-03-16'],
        ['new_cases' => 22, 'reported_at' => '2020-03-17'],
        ['new_cases' => 11, 'reported_at' => '2020-03-18'],
        ['new_cases' => 33, 'reported_at' => '2020-03-19'],
        ['new_cases' => 22, 'reported_at' => '2020-03-20'],
        ['new_cases' => 42, 'reported_at' => '2020-03-21'],
        ['new_cases' => 31, 'new_deaths' => 1, 'reported_at' => '2020-03-22'],
        ['new_cases' => 28, 'new_deaths' => 1, 'reported_at' => '2020-03-23'],
        ['new_cases' => 38, 'new_deaths' => 1, 'reported_at' => '2020-03-24'],
        ['new_cases' => 48, 'new_deaths' => 1, 'reported_at' => '2020-03-25'],
        ['new_cases' => 34, 'new_deaths' => 1, 'reported_at' => '2020-03-26'],
        ['new_cases' => 70, 'new_deaths' => 3, 'reported_at' => '2020-03-27'],
        ['new_cases' => 52, 'new_deaths' => 1, 'reported_at' => '2020-03-28'],
        ['new_cases' => 46, 'new_deaths' => 1, 'reported_at' => '2020-03-29'],
        ['new_cases' => 26, 'new_deaths' => 2, 'reported_at' => '2020-03-30'],
        ['new_cases' => 46, 'new_deaths' => 2, 'total_recovered' => 10, 'serious_critical' => 24, 'reported_at' => '2020-03-31'],
        ['new_cases' => 39, 'new_deaths' => 0, 'total_recovered' => 10, 'serious_critical' => 31, 'reported_at' => '2020-04-01'],
    ];

    public function up() {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('new_cases')->default(0);
            $table->integer('new_deaths')->default(0);
            $table->integer('new_recoveries')->default(0);
            $table->integer('total_cases')->default(0);
            $table->integer('total_deaths')->default(0);
            $table->integer('total_recoveries')->default(0);
            $table->integer('serious_critical')->default(0);
            $table->timestamp('reported_at')->nullable();
            $table->timestamps();
        });

        collect($this->attributes)->each(function ($attributes) {
            $attributes['reported_at'] = Carbon::createFromFormat('Y-m-d', $attributes['reported_at']);
            Report::create($attributes);
        });

        Report::all()->each(function (Report $report) {
            $previousReports = Report::query()->where('reported_at', '<=', $report->reported_at)->get();
            $report->update([
                'total_cases'  => $previousReports->sum('new_cases'),
                'total_deaths' => $previousReports->sum('new_deaths'),
            ]);
        });
    }

    public function down() {
        Schema::dropIfExists('reports');
    }
}
