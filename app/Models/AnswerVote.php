<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerVote extends Model
{
    protected $fillable = [
        'answer_id',
        'value',
        'ip_address',
    ];
}
