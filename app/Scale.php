<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model
{
    public function intervals() {
        return $this->belongsToMany('App\Interval', 'scale_interval_index', 'scale', 'interval');
    }
}
