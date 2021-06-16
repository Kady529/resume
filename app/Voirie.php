<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use PhpOffice\PhpSpreadsheet\Shared\Date;

class Voirie extends Model
{

    protected $primaryKey = "lot";

    protected $fillable = [
        'lot', 'prestataire','type','rue','commune','quartier','avancement','evolution','superciequartier','activites','dateMiseAjour','chantierEcole','ouvriersapprenants','nbfemmes','himo','drainage','pavage','beton','dalot','amenagement','provisoire','definitive',
    ];
}
