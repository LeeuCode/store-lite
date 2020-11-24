<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reception_item extends Model
{
    public function item()
    {
        return $this->belongsTo('App\models\Item');
    }
}
