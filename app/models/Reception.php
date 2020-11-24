<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    public function reception_items()
    {
        return $this->hasMany('App\models\Reception_item','reception_id');
    }

    public function store()
    {
        return $this->belongsTo('App\models\Store');
    }
}
