<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * Get the categories information.
     */
    public function category()
    {
        return $this->belongsTo('App\models\Category');
    }

    /**
     * Get the unities information.
     */
    public function unity()
    {
        return $this->belongsTo('App\models\Unity');
    }

    /**
     * Get the companies information.
     */
    public function company()
    {
        return $this->belongsTo('App\models\Company');
    }
}
