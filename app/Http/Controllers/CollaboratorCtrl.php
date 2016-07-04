<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Maitre_ouvrage;
use App\Laboratoire;
use App\Architecte;
use App\BET;
use App\Societe;
use Mail;

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

    public function getAll()
    {
        return array(
            "labos" =>  $this->getLabos(),
            "architectes" =>  $this->getArchs(),
            "bets" =>  $this->getBets(),
            "maitreOuvrages" =>  $this->getMaitres(),
            "societes" => $this->getSocietes()
            );
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
       // var_dump($param);
        $arc->name_archi = $param['name_archi'];
        $arc->tel_archi = $param['tel_archi'];
        $arc->fax_archi = $param['fax_archi'];
        $arc->email_archi = $param['email_archi'];
        $arc->adresse_archi = $param['adresse_archi'];
        $arc->save();
        return Architecte::all()->last();
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

    public function putCollaborator(Request $r){
            $param = $r->all();
            /*
            $param["type"] retourne le type du collaborateur à modifier, ce paramettre est ajouté
             dans configCtrl.js apres la valeur transmise dans le template de config
             */
            if ($param["type"] == 'maitre') { 
                $mat = Maitre_ouvrage::find($param['id']);
                $mat ->name_maitre_ouvrage = $param['name_maitre_ouvrage'];
                $mat ->tel_maitre_ouvrage = $param['tel_maitre_ouvrage'];
                $mat ->fax_maitre_ouvrage = $param['fax_maitre_ouvrage'];
                $mat ->email_maitre_ouvrage = $param['email_maitre_ouvrage'];
                $mat ->adresse_maitre_ouvrage = $param['adresse_maitre_ouvrage'];
                $mat ->update();
            }
            if ($param["type"] == 'bet') {
                $bet = BET::find($param['id']);
                $bet ->name_bet = $param['name_bet'];
                $bet ->tel_bet = $param['tel_bet'];
                $bet ->fax_bet = $param['fax_bet'];
                $bet ->adresse_bet = $param['adresse_bet'];
                $bet ->email_bet = $param['email_bet'];
                $bet ->update();
            }
            if ($param["type"] == 'lab') {
                $lab = Laboratoire::find($param['id']);
                $lab ->name_labo = $param['name_labo'];
                $lab ->tel_labo = $param['tel_labo'];
                $lab ->fax_labo = $param['fax_labo'];
                $lab ->email_labo = $param['email_labo'];
                $lab ->adresse_labo = $param['adresse_labo'];
                $lab ->update();
            } 
            if ($param["type"] == 'archi') {
                $archi = Architecte::find($param['id']);
                $archi ->name_archi = $param['name_archi'];
                $archi ->tel_archi = $param['tel_archi'];
                $archi ->fax_archi = $param['fax_archi'];
                $archi ->email_archi = $param['email_archi'];
                $archi ->adresse_archi = $param['adresse_archi'];
                $archi ->update();
            } 
            if ($param["type"] == 'soc') {
                $soc = Societe::find($param['id']);
                $soc ->name_societe = $param['name_societe'];
                $soc ->tel_societe = $param['tel_societe'];
                $soc ->fax_societe = $param['fax_societe'];
                $soc ->adresse_societe = $param['adresse_societe'];
                $soc ->email_societe = $param['email_societe'];
                $soc ->update();
            }
            return 0;
    }

/*envoie des mails au collaborateurs */

    public function sendMail(Request $request){

        $param = $request->all();
        $obj = json_decode($param['obj']);
        $message = "";
        $objet = "";

        foreach ($param['mail'] as $key => $value) {
            if($key=="message"){
                $message = $value;
            }
            if($key=="object"){
                $objet = $value;
            }

        }

        if(array_key_exists('email_societe', $obj)){
          
           $data = array(    
                        "objet" => $objet,
                        "message" => $message,
                        "email_dest" => $obj->email_societe,
                        "name_dest" => $obj->name_societe
                );

                Mail::raw($data['message'], function($message) use ($data){
                $message->to($data['email_dest'],$data['name_dest'])->subject($data['objet']);
            });

        }

        if(array_key_exists('email_bet', $obj)){

            $data = array(    
                        "objet" => $objet,
                        "message" => $message,
                        "email_dest" => $obj->email_bet,
                        "name_dest" => $obj->name_bet
                );

                Mail::raw($data['message'], function($message) use ($data){
                $message->to($data['email_dest'],$data['name_dest'])->subject($data['objet']);
            });
        }

        if (array_key_exists('email_archi', $obj)) {
            $data = array(    
                        "objet" => $objet,
                        "message" => $message,
                        "email_dest" => $obj->email_archi,
                        "name_dest" => $obj->name_archi
                );

                Mail::raw($data['message'], function($message) use ($data){
                $message->to($data['email_dest'],$data['name_dest'])->subject($data['objet']);
            });
        }

        if(array_key_exists('email_maitre_ouvrage', $obj)){
            $data = array(    
                        "objet" => $objet,
                        "message" => $message,
                        "email_dest" => $obj->email_maitre_ouvrage,
                        "name_dest" => $obj->name_maitre_ouvrage
                );

                Mail::raw($data['message'], function($message) use ($data){
                $message->to($data['email_dest'],$data['name_dest'])->subject($data['objet']);
            });
        }

        if(array_key_exists('email_labo', $obj)){
                $data = array(    
                        "objet" => $objet,
                        "message" => $message,
                        "email_dest" => $obj->email_labo,
                        "name_dest" => $obj->name_labo
                );

                Mail::raw($data['message'], function($message) use ($data){
                $message->to($data['email_dest'],$data['name_dest'])->subject($data['objet']);
            });

        }
    }

    public function postNewCollaborator(Request $request){

        $param = $request->all();
        if($param['type'] == 'archi'){
            $a = new Architecte();
            $a->name_archi = $param['name'];
            $a->email_archi = $param['email'];
            $a->fax_archi = $param['fax'];
            $a->tel_archi = $param['tel'];
            $a->adresse_archi = $param['adresse'];
            $a->save();
            return 'done';
        }

        if($param['type'] == 'lab'){
           $l = new Laboratoire();
           $l->name_labo = $param['name'];
           $l->email_labo = $param['email'];
           $l->tel_labo = $param['tel'];
           $l->fax_labo = $param['fax'];
           $l->adresse_labo = $param['adresse'];
           $l->save();
           return 'done';
        }

        if($param['type'] == 'bet'){
            $bet = new BET();
            $bet->name_bet = $param['name'];
            $bet->tel_bet = $param['tel'];
            $bet->fax_bet = $param['fax'];
            $bet->adresse_bet = $param['adresse'];
            $bet->email_bet = $param['email'];
            $bet->save();
            return 'done';
        }
        if($param['type']== 'maitre'){
            $maitre = new Maitre_ouvrage();
            $maitre->name_maitre_ouvrage = $param['name'];
            $maitre->tel_maitre_ouvrage = $param['tel'];
            $maitre->fax_maitre_ouvrage = $param['fax'];
            $maitre->email_maitre_ouvrage = $param['email'];
            $maitre->adresse_maitre_ouvrage = $param['adresse'];
            $maitre->save();
            return 'done';
        }
        if($param['type'] == 'soc'){
            $soc = new Societe();
            $soc->name_societe = $param['name'];
            $soc->tel_societe = $param['tel'];
            $soc->fax_societe = $param['fax'];
            $soc->email_societe = $param['email'];
            $soc->adresse_societe = $param['adresse'];
            $soc->save();
            return 'done';
        }
    }
}
