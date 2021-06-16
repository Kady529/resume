<?php

namespace App\Exports;

use App\Sensibilisation;
use Maatwebsite\Excel\Concerns\FromCollection;

class SensibilisationsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sensibilisation::all();
    }
}
