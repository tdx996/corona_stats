<?php

use App\Models\Poll;
use App\Models\PollResult;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemapPollResults extends Migration
{
    public function up() {
        $polls = Poll::all();
        $polls[0]->results->each(function(PollResult $pollResult) use ($polls) {
            $newValue = $pollResult->value <= 3 ? $polls[0]->options[0] : ($pollResult->value < 7 ? $polls[0]->options[1] : $polls[0]->options[2]);
            $pollResult->update([
                'value' => $newValue
            ]);
        });

        $polls[1]->results->each(function(PollResult $pollResult) use ($polls) {
            $newValue = $pollResult->value <= 3 ? $polls[1]->options[0] : ($pollResult->value <= 5 ? $polls[1]->options[1] : ($pollResult->value <= 8 ? $polls[1]->options[2] : $polls[1]->options[3]));
            $pollResult->update([
                'value' => $newValue
            ]);
        });
    }

    public function down() {
    }
}
