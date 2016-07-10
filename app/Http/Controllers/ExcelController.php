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
use App\Decompte;
use App\Avenant;
use Excel;


class ExcelController extends Controller{
    	
    public function getExcel($type, $year)
    {	

    	$data = array();
      $avenants = array();
      $decomptes = array();
      $i=0;
      $j=0;
    	$m = Marche::all()->where('type_budget',$type)-> where('year',$year."");
            
      $keys = array("ID du marché",
                    "Type du budget",
                    "Année",
                    "Montant",
                    "date d'ouverture des plis",
                    "date début des travaux",
                    "date de fin des travaux",
                    "pourcentage financier",
                    "pourcentage d'avancement des travaux",
                    "Architecte du marché",
                    "Email de l'archicte",
                    "Laboratoire du marché",
                    "Email du Laboratoire",
                    "bureau d'étude du marché",
                    "Email du bureau d'étude",
                    "maitre d'ouvrage du marché",
                    "Email du maitre d'ouvrage",
                    "société du marché",
                    "Email de la société"
                );

    	foreach ($m as $key => $value) {

            $a = Architecte::where('id',$value['archi_id'])->first();
            $l = Laboratoire::where('id',$value['labo_id'])->first();
            $b = BET::where('id',$value['bet_id'])->first();
            $m = Maitre_ouvrage::where('id',$value['maitre_ouvrage_id'])->first();
            $s = Societe::where('id',$value['societe_id'])->first();
            $decompte = Decompte::where('marche_id',$value['id'])->get();
            $avenant = Avenant::where('marche_id',$value['id'])->get();

            $data[] =  array("ID du marché"=> $value['id'],
                    "Type du budget" =>  $value['type_budget'],
                    "Année"=>  $value ['year'],
                    "Montant"=> $value['montant'],
                    "date d'ouverture des plis"=>$value['date_ouverture_plis'],
                    "date début des travaux"=> $value['date_debut_travaux'],
                    "date de fin des travaux" => $value['date_fin_travaux'],
                    "pourcentage financier" =>  $value['percentage_financial']." %",
                    "pourcentage d'avancement des travaux"=>$value['pourcentage_travaux']." %",
                    "Architecte du marché"=> $a['name_archi'],
                    "Email de l'archicte"=>$a['email_archi'],
                    "Laboratoire du marché"=> $l['name_labo'],
                    "Email du Laboratoire"=>$l['email_labo'],
                    "bureau d'étude du marché"=>$b['name_bet'],
                    "Email du bureau d'étude"=>$b['email_bet'],
                    "maitre d'ouvrage du marché"=>  $m['name_maitre_ouvrage'],
                    "Email du maitre d'ouvrage"=>$m['email_maitre_ouvrage'],
                    "société du marché"=>$s['name_societe'],
                    "Email de la société"=>$s['email_societe']
                  );  

           /* if(is_null($avenant)){

            }
            else{
              
              foreach ($avenant as $key1 => $value1 ) {
                $i++;
                //$keys [] = "Montant de l'avenant ".$i;
                //$data[] = $value1['montant'][0];
               
                //$keys [] = "Objet de l'avenant ".$i;
                //$data [] = $value1['objet'];
              }
            }

            if(is_null($decomptes)){
               
            }

            else{
                  
                  foreach ($decomptes as $key2 => $value2 ) {
                    $j++;
                    //$keys [] = "Montant du decompte ".$j;
                    //$data[] = $value2['montant'];
                
              }
            }*/
    	}

     
    
/*Generation Du fichier Excel sur tous les marchés de la Base de données*/
   Excel::create('liste_marches', function($excel) use($data) {

    		$excel->sheet('Sheetname', function($sheet) use($data) {
    			
        		$sheet->fromArray($data);

    		});

		})->export('xls');
    }
}
