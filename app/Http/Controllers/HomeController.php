<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index() {
        $reports = Report::all();
        $poll = $this->findPoll();

        $dateLabels = $this->dateLabels($reports);

        return view('home.index', compact('poll', 'reports', 'dateLabels'));
    }

    public function infogram() {
        return view('home.infogram');
    }

    private function dateLabels(Collection $reports): array {
        return $reports
            ->pluck('reported_at')
            ->map(function (Carbon $date) {
                return $date->format('M d');
            })
            ->toArray();
    }

    private function findPoll(): ?Poll {
        $poll = Poll::query()
            ->whereDoesntHave('results', function (Builder $query) {
                $query->where('ip_address', request()->ip());
            })
            ->latest()
            ->first();

        if ($poll && Cookie::get('poll_answered') == $poll->id)
            return null;

        return $poll;
    }
}
