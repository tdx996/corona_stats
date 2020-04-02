<?php

namespace App\Models;

class Report extends Model
{
    protected $fillable = [
        'new_cases',
        'new_deaths',
        'new_hospitalized',
        'new_intense_care',
        'new_tests_performed',
        'total_cases',
        'total_deaths',
        'total_hospitalized',
        'total_intense_care',
        'total_tests_performed',
        'reported_at',
    ];

    protected $dates = ['reported_at'];
}
