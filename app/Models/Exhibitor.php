<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    public function country()
    {
    	return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School', 'school_id');
    }
}
