<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    public function index() {
        $questions = Question::query()
            ->orderBy('created_at', 'DESC')
            ->with(['topAnswers' => function(HasMany $query) {
                $query->orderBy('created_at', 'DESC');
            }])
            ->get();

        return view('questions.index', compact('questions'));
    }

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
