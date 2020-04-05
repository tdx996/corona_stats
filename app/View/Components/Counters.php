<?php

namespace App\View\Components;

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\View\Component;

class Counters extends Component
{
    public $totalActive, $newActive;

    public $reportToday, $reportYesterday;

    public function __construct() {
        $this->reportYesterday = $this->findYesterdayReport();
        $this->reportToday = $this->findTodayReport() ?? $this->reportYesterday;

        $this->setActive();
    }

    public function render() {
        return view('components.counters');
    }

    private function setActive() {
        $this->totalActive = $this->reportYesterday->total_cases - $this->reportToday->total_deaths - $this->reportToday->total_recovered;
        $this->newActive = ($this->reportYesterday->new_cases ?? 0) - ($this->reportToday->newDeaths ?? 0) - ($this->reportToday->newRecovered ?? 0);
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
