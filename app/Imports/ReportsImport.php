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
        '2020-03-17' => 3,
        '2020-03-18' => 6,
        '2020-03-19' => 18,
        '2020-03-20' => 26,
        '2020-03-21' => 28,
        '2020-03-22' => 32,
        '2020-03-23' => 35,
        '2020-03-24' => 37,
        '2020-03-25' => 42,
        '2020-03-26' => 48,
        '2020-03-27' => 54,
        '2020-03-28' => 54,
        '2020-03-29' => 57,
        '2020-03-30' => 64,
        '2020-03-31' => 72,
        '2020-04-01' => 78,
        '2020-04-02' => 83,
        '2020-04-03' => 93,
        '2020-04-04' => 98,
        '2020-04-05' => 102,
        '2020-04-06' => 115,
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
