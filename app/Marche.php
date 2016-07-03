<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marche extends Model
{
    public function labo()
    {
    	return $this->belongsTo('App\Laboratoire');
    }
    public function bet()
    {
    	return $this->belongsTo('App\BET');
    }
    public function archi()
    {
    	return $this->belongsTo('App\Architecte');
    }
    public function maitre_ouvrage()
    {
    	return $this->belongsTo('App\Maitre_ouvrage');
    }
    public function societe()
    {
    	return $this->belongsTo('App\Societe');
    }
}
