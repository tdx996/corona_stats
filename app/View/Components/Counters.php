<?php

namespace App\View\Components;

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\View\Component;

class Counters extends Component
{
    public $totalCases, $newCases;
    public $totalHospitalized, $newHospitalized;
    public $totalCritical, $newCritical;
    public $totalDeaths, $newDeaths;
    public $totalTests, $newTests;
    public $totalRecovered, $newRecovered;
    public $totalActive, $newActive;

    private $reportToday, $reportYesterday;

    public function __construct() {
        $this->reportYesterday = $this->findYesterdayReport();
        $this->reportToday = $this->findTodayReport() ?? $this->reportYesterday;

        $this->setCases();
        $this->setHospitalized();
        $this->setCritical();
        $this->setDeaths();
        $this->setTests();
        $this->setRecovered();
        $this->setActive();
    }

    public function render() {
        return view('components.counters');
    }

    private function setCases() {
        $this->totalCases = $this->reportYesterday->total_cases;
        $this->newCases = $this->reportYesterday->new_cases;
    }

    private function setHospitalized() {
        $this->totalHospitalized = $this->reportToday->total_hospitalized;
        $this->newHospitalized = $this->reportToday->new_hospitalized;
    }

    private function setCritical() {
        $this->totalCritical = $this->reportToday->total_critical;
        $this->newCritical = $this->reportToday->new_critical;
    }

    private function setDeaths() {
        $this->totalDeaths = $this->reportToday->total_deaths;
        $this->newDeaths = $this->reportToday->new_deaths;
    }

    private function setTests() {
        $this->totalTests = $this->reportYesterday->total_tests;
        $this->newTests = $this->reportYesterday->new_tests;
    }

    private function setRecovered() {
        $this->totalRecovered = $this->reportToday->total_recovered;
        $this->newRecovered = $this->reportToday->new_recovered;
    }

    private function setActive() {
        $this->totalActive = $this->totalCases - $this->totalDeaths - $this->totalRecovered;
        $this->newActive = ($this->newCases ?? 0) - ($this->newDeaths ?? 0) - ($this->newRecovered ?? 0);
    }

    private function findTodayReport() {
        return Report::query()
            ->whereDate('reported_at', Carbon::today())
            ->first();
    }

    private function findYesterdayReport() {
        return Report::query()
            ->whereDate('reported_at', Carbon::yesterday())
            ->first();
    }
}
