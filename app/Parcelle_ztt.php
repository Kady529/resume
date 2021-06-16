<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcelle_ztt extends Model
{

    protected $primaryKey = "num";

    protected $fillable = [
        'num', 'bailleur','type','nom','etat','etat_pr','surface','commune','quartier',
    ];
}
