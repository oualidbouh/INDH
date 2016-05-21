<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Maitre_ouvrage;
use App\Laboratoire;
use App\Architecte;
use App\BET;
use App\Societe;

class CollaboratorCtrl extends Controller
{

    // GET METHODS
    public function getLabos()
    {
        $lab = new laboratoire();
        $datas=$lab->lists('labo_id','name_labo');
        $labos = [];
        foreach($datas as $data => $value){
            /*Creer objet JSON*/
           $labos[]=array("id"=>$value,"name"=>$data);
        }
        /*retourne tous les labos*/
    return $labos;
    }

    public function getBets()
    {
         $arch = new BET();
        $datas =  $arch->lists('bet_id','name_bet');
        $archs = [];
        foreach ($datas as $data => $value) {
            $archs[]=array("id"=>$value,"name"=>$data);
        }
        return $archs;
        //return BET::all();
    }

    public function getArchs()
    {
        $arch = new Architecte();
        $datas =  $arch->lists('archi_id','name_archi');
        $archs = [];
        foreach ($datas as $data => $value) {
            $archs[]=array("id"=>$value,"name"=>$data);
        }
        return $archs;
    }

    public function getSocietes()
    {
        $soc = new Societe();
        $datas=$soc->lists('societe_id','name_societe');

        $socs = [];
        foreach ($datas as $data => $value) {
            $socs[]= array("id"=>$value,"name"=>$data);
        }

        return $socs;
    }

    public function getMaitres($value='')
    {
         $m = new Maitre_ouvrage();
        $datas=$m->lists('Maitre_ouvrage_id','name_maitre_ouvrage');

        $maitres = [];
        foreach ($datas as $data => $value) {
            $maitres[]= array("id"=>$value,"name"=>$data);
        }

        return $maitres;
    }


    // POST METHODS
    public function postLabos(Request $request)
    {
        $labo = new Laboratoire();

    }
// Regler la Tablde de BET
    public function postBets(Request $request)
    {
        
    }

    public function postArchs(Request $request)
    {
        $arc = new Architecte();
    }

    public function postSocietes(Request $request)
    {
        $soc = new Societe();
    }

    public function postMaitres(Request $request)
    {
        $maitre = new Maitre_ouvrage();
    }
}
