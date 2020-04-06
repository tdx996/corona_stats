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

class HomeController extends Controller
{
    public function index() {
        $reports = Report::all();
        $poll = $this->findPoll();
        $question = Question::query()->inRandomOrder()->first();

        $dateLabels = $this->dateLabels($reports);

        return view('home.index', compact('poll', 'reports', 'dateLabels', 'question'));
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
        return  Poll::query()
            ->whereDoesntHave('results', function (Builder $query) {
                $query->where('ip_address', request()->ip());
            })
            ->latest()
            ->first();
    }
}
