<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * @property array options
 * @property Collection results
 */
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
