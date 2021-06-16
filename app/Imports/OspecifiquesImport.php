<?php

namespace App\Imports;

use App\Ospecifique;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OspecifiquesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            //dd($row['val_2019']);
            return new Ospecifique([
                'num_indicateur'      => $row['num_indicateur'],
                'intitule_indicateur' => $row['intitule_indicateur'],
                'val_2019'            => $row['val_2019'],
                'val_2020'            => $row['val_2020'],
                'val_2021'            => $row['val_2021'],
                'val_2022'            => $row['val_2022'],
                'val_cible'           => $row['val_cible'],
                'unite'               => $row['unite'],
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
}
