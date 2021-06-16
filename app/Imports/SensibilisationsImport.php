<?php

namespace App\Imports;

use App\Sensibilisation;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SensibilisationsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sensibilisation([
            'date_sensib' => date('Y-m-d H:i:s', strtotime($row['date_sensib'])),
            'ong' => $row['ong'],
            'type' => $row['type'],
            'personnes' => $row['personnes'],
            'menage' => $row['menage'],
        ]);
    }
}
