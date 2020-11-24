<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function receptions()
    {
        return $this->hasMany('App\models\Reception');
    }

    public function dismissals()
    {
        return $this->hasMany('App\models\Dismissal');
    }

    public function reactionaries()
    {
        return $this->hasMany('App\models\Reactionary');
    }

    public function items()
    {
        return $this->hasMany('App\models\Quantity');
    }
}
