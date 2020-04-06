<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PollsController extends Controller
{
    public function answer(Poll $poll, Request $request) {
        $poll->results()->create([
            'ip_address' => $request->ip(),
            'value'      => $request->get('value')
        ]);

        return redirect()->back();
    }
}
