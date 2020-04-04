<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    public function show(Question $question) {
        $answersGroupedByDay = $question
            ->answers()
            ->orderBy('created_at', 'DESC')
            ->with('votes')
            ->get()
            ->mapToGroups(function (Answer $answer) {
                return [
                    $answer->created_at->format('d.m.Y') => $answer,
                ];
            });

        return view('questions.show', compact('question', 'answersGroupedByDay'));
    }
}
