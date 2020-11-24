<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Dismissal extends Model
{
    public function dismissal_items()
    {
        return $this->hasMany('App\models\Dismissal_item','dismissal_id');
    }

    public function store()
    {
        return $this->belongsTo('App\models\Store');
    }
}
