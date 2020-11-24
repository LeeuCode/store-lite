<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    public function store()
    {
        return $this->belongsTo('App\models\Store');
    }

    public function item()
    {
        return $this->belongsTo('App\models\Item');
    }
}
