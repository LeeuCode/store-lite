<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reactionary extends Model
{
    public function reactionary_items()
    {
        return $this->hasMany('App\models\Reactionary_item','reactionary_id');
    }

    public function store()
    {
        return $this->belongsTo('App\models\Store');
    }
}
