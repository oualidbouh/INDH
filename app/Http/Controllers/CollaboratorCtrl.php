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
        $labo->name_labo = $param['name_labo'];
        $labo->tel_labo = $param['tel_labo'];
        $labo->fax_labo = $param['fax_labo'];
        $labo->email_labo = $param['email_labo'];
        $labo->adresse_labo = $param['adresse_labo'];
        $labo->save();
        /*dans le formualire d'ajout on doit ajouter le labo saisi à la liste donc nous allons le retourner*/
        return Laboratoire::all()->last();

    }

    public function postBets(Request $request)
    {
        $param = $request->all();
        $bet = new BET();
        $bet->name_bet = $param['name_bet'];
        $bet->tel_bet = $param['tel_bet'];
        $bet->fax_bet = $param['fax_bet'];
        $bet->adresse_bet = $param['adresse_bet'];
        $bet->email_bet = $param['email_bet'];
        $bet->save();
        return BET::all()->last();
    }

    public function postArchs(Request $request)
    {
        $param = $request->all();
        $arc = new Architecte();
        $arc->name_archi = $param['name_archi'];
        $arc->tel_archi = $param['tel_archi'];
        $arc->fax_archi = $param['fax_archi'];
        $arc->email_archi = $param['email_archi'];
        $arc->adresse_archi = $param['adresse_archi'];
        $arc->save();
        return Architecture::all()->last();
    }


    public function postSocietes(Request $request)
    {
        $param = $request->all();
        $soc = new Societe();
        $soc->name_societe = $param['name_societe'];
        $soc->tel_societe = $param['tel_societe'];
        $soc->fax_societe = $param['fax_societe'];
        $soc->email_societe = $param['email_societe'];
        $soc->adresse_societe = $param['adresse_societe'];
        $soc->save();
       return Societe::all()->last();
    }


    public function postMaitres(Request $request)
    {
        $param = $request->all();
        $maitre = new Maitre_ouvrage();
        $maitre->name_maitre_ouvrage = $param['name_maitre_ouvrage'];
        $maitre->tel_maitre_ouvrage = $param['tel_maitre_ouvrage'];
        $maitre->fax_maitre_ouvrage = $param['fax_maitre_ouvrage'];
        $maitre->email_maitre_ouvrage = $param['email_maitre_ouvrage'];
        $maitre->adresse_maitre_ouvrage = $param['adresse_maitre_ouvrage'];
        $maitre->save();
        return Maitre_ouvrage::all()->last();
    }
}
