<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'new_cases',
        'new_deaths',
        'new_recoveries',
        'total_cases',
        'total_deaths',
        'total_recoveries',
        'serious_critical',
        'reported_at',
    ];

    protected $dates = ['reported_at'];
}
