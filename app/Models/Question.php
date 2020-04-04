<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'content'
    ];

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function topAnswers() {
        return $this->answers()->limit(3);
    }
}
