<?php

namespace App\Models;

class Report extends Model
{
    protected $fillable = [
        'new_cases',
        'new_deaths',
        'new_hospitalized',
        'new_critical',
        'new_tests',
        'new_active',
        'total_cases',
        'total_deaths',
        'total_hospitalized',
        'total_critical',
        'total_tests',
        'total_active',
        'reported_at',
    ];

    protected $dates = ['reported_at'];
}
