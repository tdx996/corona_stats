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
            ->with(['answers' => function(HasMany $query) {
                $query->orderBy('created_at', 'DESC');
            }])
            ->get();

        return view('questions.index', compact('questions'));
    }

    public function show(Question $question) {
        $answers = $question
            ->answers()
            ->orderBy('created_at', 'DESC')
            ->with('votes')
            ->get();

        return view('questions.show', compact('question', 'answers'));
    }
}
