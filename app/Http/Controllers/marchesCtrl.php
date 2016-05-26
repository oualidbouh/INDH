<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Marche;
use App\March_Societe;

class marchesCtrl extends Controller
{
   /* public function getMarkets($year,$type)
    {
    	$m = new Marche();
    	return $m->where('year',$year)->first();
    }
*/
    /*BP markets*/
    
    public function getBpMarkets($year)
    {
    	return Marche::all()->where('type_budget','BP')-> where('year',$year."");
    }

    /*BG market*/
     public function getBgMarkets($year)
     {
    	return Marche::all()->where('type_budget','BG')-> where('year',$year."");
    }

    /*INDH market*/
     public function getIndhMarkets($year){
    	return Marche::all()->where('type_budget','INDH')-> where('year',$year."");
    }

    public function postMarket(Request $request)
    {
    	$marche = new Marche();
    	$param = $request->all();
    	return $param;
    	
    	$marche->year = $param['year'];
    	$marche->type_budget = $param['type_budget'];
    	$marche->objet = $param['objet'];
    	$marche->montant= $param['montant'];
    	$marche->date_ouverture_plis = $param['date_ouverture_plis'];
    	$marche->date_debut_travaux = $param['date_debut_travaux'];	

    	$date = new Carbon($param['date_debut_travaux']);
    	$date_fin_travaux = $date->addDays($param['date_fin_travaux']);
    	$marche->date_fin_travaux = $date_fin_travaux->format('d-m-y');

    	$marche->labo_id = $param['labo_id'];
    	$marche->archi_id = $param['archi_id'];
    	$marche->bet_id = $param['bet_id'];
    	$marche->maitre_ouvrage_id = $param['maitre_ouvrage_id'];
    	$marche->sum_decomptes = 0;
    	$marche->percentage_financial = 0;
    	$marche->pourcentage_travaux = 0;
    	$marche->save();
    	$id = Marche::all()->last()->march_id;
    	$m_s = new Marche_Societe();
    	$m_s->soc_id = $param['soc_id'];
    	$m_s->march_id = 4;
    	$m_s->save();
    }

}



?>