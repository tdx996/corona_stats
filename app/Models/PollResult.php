<?php

namespace App\Models;

class PollResult extends Model
{
    protected $fillable = [
        'poll_id',
        'ip_address',
        'value'
    ];

    public function poll() {
        return $this->belongsTo(Poll::class);
    }
}
