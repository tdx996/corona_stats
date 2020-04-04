<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnswersController extends Controller
{
    public function store(Question $question, Request $request) {
        $validator = Validator::make($request->all(), [
            'content' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $question->answers()->create($this->attributes());

        $request->session()->flash('success', 'Uspešno ste odgovorili.');

        return redirect()->back();
    }

    public function upVote(Question $question, Answer $answer) {
        return $this->vote($answer, 1);
    }

    public function downVote(Question $question, Answer $answer) {
        return $this->vote($answer, -1);
    }

    private function vote(Answer $answer, int $value) {
        $ip = request()->ip();
        $attributes = [
            'value'      => $value,
            'ip_address' => $ip
        ];

        $vote = $answer->votes()->where('ip_address', $ip)->first();
        if ($vote) {
            $vote->update($attributes);
        } else {
            $answer->votes()->create($attributes);
        }

        return redirect()->back();
    }

    private function attributes() {
        return request()->only('full_name', 'content') + [
                'ip_address' => request()->ip()
            ];
    }
}
