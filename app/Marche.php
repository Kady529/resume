<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
            public function scopeFilter($query, QueryFilter $filters)
                {
                    return $filters->apply($query);
                }

}
