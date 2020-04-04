<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'content',
        'full_name',
        'question_id',
        'ip_address',
    ];

    public function votes() {
        return $this->hasMany(AnswerVote::class);
    }
}
