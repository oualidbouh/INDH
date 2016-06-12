<?php

namespace App\Http\Controllers;
/*Class carbon for timestamp*/
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Response;
use App\Http\Requests;
use App\Marche;
use App\March_Societe;
use App\Decomptes;


use Mail;
class marchesCtrl extends Controller
{
   /* public function getMarkets($year,$type)
    {
    	$m = new Marche();
    	return $m->where('year',$year)->first();
    }
*/
    /*BP markets*/
    

    public function getDecomptes($id){
        return Decomptes::where('marche_id',$id)->get();
    }

    public function getMarkets($year,$type)
    {
    	//return Marche::all()->where('type_budget',$type)-> where('year',$year."");
    	$markets = Marche::all();
    	foreach ($markets as $key) {
    		var_dump($key->maitre);
    	}
    }

    /*Delete function*/
    public function deleteMarket($id){
        $m = Marche::find($id);
        $m->delete();
        return Response::make('ok',200);
    }

   /*POST functions*/

    public function postMarket(Request $request)
    {
    	$marche = new Marche();
    	$param = $request->all();
    	
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
    	
    	/*jointure Marche_societe*/
    	$id = Marche::all()->last()->march_id;
    	$m_s = new Marche_Societe();
    	$m_s->soc_id = $param['soc_id'];
    	$m_s->march_id = 4;
    	$m_s->save();
    }


/*Ajout des decomptes dans la BD*/
    public function addDecompte($id,Request $req){

        $param = $req->all();
        $decompte = new Decomptes();
        $decompte->march_id = $id;
        $decompte->montant = $param['montant'];
        $decompte->save();

        return Response::make('ok',200);

    }

    public function sendMail(){

          Mail::raw('teeeest', function($message){
            $message->to('ilhammzr@gmail.com', 'Oualid Bouh')->subject('Welcome!');
        });
          echo "ahchiiii";
    }

}






?>