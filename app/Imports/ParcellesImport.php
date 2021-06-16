<?php

namespace App\Imports;

//use App\Parcelle;
use App\Parcelle_ztt;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ParcellesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Parcelle_ztt([
            'num'     => $row[0],
            'bailleur'    => $row[1],
            'type'    => $row[2],
            'nom'    => $row[3],
            'etat'    => $row[4],
            'etat_pr'    => $row[5],
            'surface'    => $row[6],
            'commune'    => $row[7],
            'quartier'    => $row[8],
        ]);
    }
}
