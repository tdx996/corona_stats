<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    public function index() {
        $reports = Report::all();

        $dateLabels = $this->dateLabels($reports);

        return view('home', compact('reports', 'dateLabels'));
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
