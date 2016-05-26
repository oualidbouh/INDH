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
        return Laboratoire::all();
    }

    public function getBets()
    {
         
        return BET::all();
    }

    public function getArchs()
    {
        return Architecte::all();
    }

    public function getSocietes()
    {
       return Societe::all();
    }

    public function getMaitres()
    {
       return Maitre_ouvrage::all();
    }


    // POST METHODS
    public function postLabos(Request $request)
    {
        $param = $request->all();
        $labo = new Laboratoire();
        $labo->name_labo = $param['nom'];
        $labo->tel_labo = $param['tel'];
        $labo->fax_labo = $param['fax'];
        $labo->email_labo = $param['email'];
        $labo->adresse_labo = $param['adresse'];
        
        //return \Response::make('ok',200);
        $labo->save();
        return Laboratoire::all()->last();

    }

    public function postBets(Request $request)
    {
        $param = $request->all();
        $bet = new BET();
        $bet->name_bet = $param['nom'];
        $bet->tel_bet = $param['tel'];
        $bet->fax_bet = $param['fax'];
        $bet->adresse_bet = $param['adresse'];
        $bet->email_bet = $param['email'];
        $bet->save();
        return BET::all()->last();
    }

    public function postArchs(Request $request)
    {
        $param = $request->all();
        $arc = new Architecte();
        $arc->name_archi = $param['nom'];
        $arc->tel_archi = $param['tel'];
        $arc->fax_archi = $param['fax'];
        $arc->email_archi = $param['email'];
        $arc->adresse_archi = $param['adresse'];
        $arc->save();
        return Architecture::all()->last();
    }


    public function postSocietes(Request $request)
    {
        $param = $request->all();
        $soc = new Societe();
        $soc->name_societe = $param['nom'];
        $soc->tel_societe = $param['tel'];
        $soc->fax_societe = $param['fax'];
        $soc->email_societe = $param['email'];
        $soc->adresse_societe = $param['adresse'];
        $soc->save();
       return Societe::all()->last();
    }


    public function postMaitres(Request $request)
    {
        $param = $request->all();
        $maitre = new Maitre_ouvrage();
        $maitre->name_maitre_ouvrage = $param['nom'];
        $maitre->tel_maitre_ouvrage = $param['tel'];
        $maitre->fax_maitre_ouvrage = $param['fax'];
        $maitre->email_maitre_ouvrage = $param['email'];
        $maitre->adresse_maitre_ouvrage = $param['adresse'];
        $maitre->save();
        return Maitre_ouvrage::all()->last();
    }
}
