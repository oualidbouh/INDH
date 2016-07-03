<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Marche;
use App\Architecte;
use App\Laboratoire;
use App\BET;
use App\Societe;
use App\Maitre_ouvrage;
use Excel;


class ExcelController extends Controller{
    	
    public function getExcel()
    {	

    	$data = array();
    	$m = Marche::all();
      

    	foreach ($m as $key => $value) {

            $a = Architecte::where('id',$value['archi_id'])->first();
            $l = Laboratoire::where('id',$value['labo_id'])->first();
            $b = BET::where('id',$value['bet_id'])->first();
            $m = Maitre_ouvrage::where('id',$value['maitre_ouvrage_id'])->first();
            $s = Societe::where('id',$value['societe_id'])->first();

            $data[] =  array(
                      "ID du Marché" =>$value['id'],
                      "Type du budget" =>$value['type_budget'],
                      "Année" => $value ['year'],
                      "Montant du marché " => $value['montant'],
                      "date d'ouverture des plis" => $value['date_ouverture_plis'],
                      "date début des travaux" => $value['date_debut_travaux'],
                      "date de fin des travaux"=>$value['date_fin_travaux'],
                      "pourcentage financier"=>$value['percentage_financial']." %",
                      "pourcentage d'avancement des travaux"=>$value['pourcentage_travaux']." %",
                      "Architecte du marché"=>$a['name_archi'],
                      "Email de l'archicte"=>$a['email_archi'],
                      "Laboratoire du marché"=> $l['name_labo'],
                      "Email du Laboratoire" => $l['email_labo'],
                      "bureau d'étude du marché"=> $b['name_bet'],
                      "Email du bureau d'étude" => $b['email_bet'],
                      "maitre d'ouvrage du marché"=> $m['name_maitre_ouvrage'],
                      "Email du maitre d'ouvrage" => $m['email_maitre_ouvrage'],
                      "société du marché"=> $s['name_societe'],
                      "Email de la société" => $s['email_societe']
                );	
    	}

/*Generation Du fichier Excel sur tous les marchés de la Base de données*/
    	Excel::create('liste_marches', function($excel) use($data) {

    		$excel->sheet('Sheetname', function($sheet) use($data) {
    			
        		$sheet->fromArray($data);

    		});

		})->export('xls');
    }
}
