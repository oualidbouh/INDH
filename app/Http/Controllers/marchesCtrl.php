<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class marchesCtrl extends Controller
{
    public function getMarkets($year)
    {
    	$m = new Marche();
    	return $m->where('year',$year)->first();
    }
}

?>