<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensibilisation extends Model
{

    protected $primaryKey = "id";

    protected $fillable = [
        'date_sensib','ong','type','personnes','menage'
    ];
}
