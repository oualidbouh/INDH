<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
    public function maitre(){
    	return $this->belongsTo('App\Maitre_ouvrage');
    }
}
