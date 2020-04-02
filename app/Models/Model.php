<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * @property int id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Model extends BaseModel
{
    public function scopeLast(Builder $query) {
        return $query->latest($this->primaryKey)->first();
    }
}
