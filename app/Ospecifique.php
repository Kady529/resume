<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ospecifique extends Model
{
    protected $primaryKey = "num_indicateur";

    protected $fillable = [
        'num_indicateur', 'intitule_indicateur','val_2019','val_2020','val_2021','val_2022','val_cible','unite'];
}
