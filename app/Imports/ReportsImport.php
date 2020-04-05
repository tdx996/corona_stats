<?php

namespace App\Imports;

use App\Models\Report;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ReportsImport implements OnEachRow, WithHeadingRow
{
    use Importable;

    protected $recovered = [
        '2020-04-03' => 70,
        '2020-04-04' => 79,
        '2020-04-05' => 79,
        '2020-04-06' => 79,
    ];

    public function onRow(Row $row) {
        $data = $row->toArray();
        $reportedAt = Carbon::instance(Date::excelToDateTimeObject($data['datum']));

        Report::query()
            ->whereDate('reported_at', $reportedAt)
            ->firstOr(function () {
                return new Report;
            })->fill([
                'reported_at'        => $reportedAt,
                'new_tests'          => $data['st_testiranj'],
                'new_cases'          => $data['st_pozitivnih_oseb'],
                'new_deaths'         => $data['dnevno_st_umrlih_oseb'],
                'total_hospitalized' => $data['skupno_st_hospitaliziranih_na'],
                'total_critical'     => $data['skupno_stevilo_oseb_na_intenzivni_negi_na_dan'],
                'total_recovered'    => $this->recovered[$reportedAt->format('Y-m-d')],
            ])
            ->save();
    }
}
