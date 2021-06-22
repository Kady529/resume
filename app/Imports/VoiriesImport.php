<?php

namespace App\Imports;

use App\Voirie;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class VoiriesImport implements ToModel,WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            $d_m_a = (Date::excelToDateTimeObject($row['date_mise_a_jour']));
            //dd($row);
            return new Voirie([
                'lot' => $row['lot'],
                'prestataire' => $row['prestataire'],
                'type' => $row['type'],
                'rue' => $row['rue'],
                'commune' => $row['commune'],
                'quartier' => $row['quartier'],
                'avancement' => $row['avancement'],
                'evolution' => $row['evolution'],
                'superficiequartier' => $row['superficie_quartier'],
                'activites' => $row['activites'],
                'dateMiseAjour' => $d_m_a,
                'chantierEcole' => $row['chantierEcole' ],
                'ouvriersapprenants' => $row['ouvriersapprenants'],
                'nbfemmes' => $row['nbfemmes'],
                'himo' => $row['himo'],
                'drainage' => $row['drainage'],
                'pavage' => $row['pavage'],
                'beton' => $row['beton'],
                'dalot' => $row['dalot'],
                'amenagement' => $row['amenagement'],
                'provisoire' => $row['provisoire'],
                'definitive' => $row['definitive'],
            ]);
        }catch (\Exception $e){
            dd($e);
        }

    }
}
