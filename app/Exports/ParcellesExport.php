<?php

namespace App\Exports;

use App\Parcelle_ztt;
use Maatwebsite\Excel\Concerns\FromCollection;

class ParcellesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Parcelle_ztt::all();
    }
}
