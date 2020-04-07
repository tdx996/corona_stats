<?php

namespace App\Http\Controllers;

use App\Mail\PollSuggestion;
use App\Models\Poll;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PollsController extends Controller
{
    public function answer(Poll $poll, Request $request) {
        $poll->results()->create([
            'ip_address' => $request->ip(),
            'value'      => $request->get('value')
        ]);

        return redirect()->back();
    }

    public function suggest(Request $request) {
        $mailable = new PollSuggestion($request->get('question'), $request->get('answers'));
        Mail::to([env('INFO_EMAIL')])->send($mailable);

        $request->session()->flash('success', 'Hvala za predlog.');

        return redirect()->back();
    }
}
