<?php

namespace App\Imports;

use App\Models\Report;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReportsImport implements ToModel, WithHeadingRow
{
    public function model(array $row) {
        $row['reported_at'] = Carbon::createFromFormat('Y-m-d', $row['reported_at']);
        return new Report($row);
    }
}
