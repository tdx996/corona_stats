<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Question;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cookie;

class ChartsController extends Controller
{
    public function newTestsVsNewCases() {
        $reports = Report::all();
        $dateLabels = $this->dateLabels($reports);

        return view('charts.new_tests_vs_new_cases', compact('reports', 'dateLabels'));
    }

    private function dateLabels(Collection $reports): array {
        return $reports
            ->pluck('reported_at')
            ->map(function (Carbon $date) {
                return $date->format('M d');
            })
            ->toArray();
    }
}
