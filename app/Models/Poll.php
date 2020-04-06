<?php

namespace App\Models;

class Poll extends Model
{
    protected $fillable = [
        'question'
    ];

    protected $casts = [
        'options' => 'array'
    ];

    public function results() {
        return $this->hasMany(PollResult::class);
    }
}
