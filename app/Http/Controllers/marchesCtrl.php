<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Http\Input;
use App\Marche;
use App\Laboratoire;
use App\BET;
use App\Societe;
use App\Maitre_ouvrage;
use App\March_Societe;
use App\Decompte;
use App\Avenant;
use App;
use Mail;
use PDF;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response as fileRes;
use JildertMiedema\LaravelPlupload\Facades\Plupload;
class marchesCtrl extends Controller
{

    
     private $r ;
    
    public function login(Request $r)
    {
        //var_dump($r->all()["login"]);
        //die();
        return (User::where('email',$r->all()["login"])->where("password",$r->all()["password"])->get());
    }
    public function getMarkets($year,$type){
    	
        $markets = Marche::all()->where('type_budget',$type)-> where('year',$year."")->where('archive',"0");
        $marketsArray = array();
        foreach ($markets as $m ) {
            $marketsArray[] = array(
                "id" => $m->id,
                "objet"=>$m->objet,
                "montant" =>$m->montant,
                "date_ouverture_plis" => $m->date_ouverture_plis,
                "date_debut_travaux" => $m->date_debut_travaux,
                "date_fin_travaux" => $m->date_fin_travaux,
                "labo" => $m->labo,
                "societe" => $m->societe,
                "bet" => $m->bet,
                "architecte" => $m->archi,
                "maitreOuvrage" =>$m->maitre_ouvrage,
                "pourcentage_financier" =>$this->calculePourcentageFinancier($m),
                "pourcentage_travaux" =>$m->pourcentage_travaux,
                "somme_decomptes" => $m->sum_decomptes,
                "somme_avenants" => $m->sum_avenants,
                "etat" => $this->getState($m)
                );
        }
//        var_dump($marketsArray);
        return $marketsArray;
    }
    private function getState($m)
    {
        
        //this methode returns 3 states (error or success) for appropriate display in he front-end
        //1 => success ; 0 => danger ;
        
        //$pt = $m->pourcentage_travaux;//pourcentage des travaux
        $now = Carbon::now();
        $then = Carbon::parse($m->date_fin_travaux);        

        $totalDuration = $then->diffInDays($now);
        if($totalDuration > 10 /*&& $pt > 30*/){
            return 1;
        }

        return 0;
    }

     public function getImages($id)
    {
           $path = storage_path() . '/images' ;

           $files = scandir($path);
           $images = [];
           //var_dump($files);

           for($i = 2;$i<count($files);$i++){
                if(explode("_",$files[$i])[0] == $id){
                    $red = 'data:image/'.explode('.', $files[$i])[1].';base64,' . base64_encode(file_get_contents($path."/".$files[$i]));
                    $images[] = array(
                            "src" => $red,
                            "date" => explode("_",$files[$i])[1],
                            "ext" => explode('.', $files[$i])[1]
                        );
                }
           }
            return $images;
    }

    public function deleteImage($iid)//param1:market Id , param2 image id;
    {
        $path = storage_path() . '/images' ;
        if(unlink($path."/".$iid)){
            return "OK";
        }
    }




    public function putMarket(Request $req,$id)
    {
        $m = Marche::find($id);
        $params = $req->all();
        try {
            $m->date_fin_travaux = $params["date_fin_travaux"];
            $m->date_debut_travaux = $params['date_debut_travaux'];
            $m->date_ouverture_plis = $params['date_ouverture_plis'];
            $m->montant = $params['montant'];
            $m->objet = $params['objet'];
            
            $couples = array(
                'labo_id' => 'labo_id',
                 'maitre_id'=> 'maitre_ouvrage_id',
                 "bet_id" => "bet_id",
                 'archi_id' => "architecte_id",
                 "societe_id" => "societe_id"
                );


            foreach($couples as $k => $v){
                if(array_key_exists($k,$params)){
                    $m->$v = $params[$k];
                }
            }

            $m->percentage_financial = $params['pourcentage_financier'];
            $m->pourcentage_travaux = $params['pourcentage_travaux'];
            $m->sum_decomptes = $params['somme_decomptes'];
            $m->update();
        } catch (Exception $e) {
            var_dump($e);
        }
        return 0;
    }
    private function calculePourcentageFinancier($m)
    {
        $decs = $this->getDecomptes($m->id);
        $s = 0;
        
       foreach ($decs as $key => $value) {
           $s = intval($s)+intval($decs[$key]->montant);
       }
       $m->sum_decomptes = $s;
       $m->sum_avenants = $this->calculeAvenants($m);
        return round(100*($s/($m->montant+$m->sum_avenants)));
    }
    private function calculeAvenants($m)
    {
        $aves = $this->getAvenants($m->id);
        $s = 0;
        foreach ($aves as $key => $value) {
            $s = intval($s)+intval($aves[$key]->montant);
        }

        return $s;
    }

    public function deleteMarket($id){
        $m = Marche::find($id);
        $m->archive = 1;
        $m->save();
    }


    public function postMarket(Request $request){
    	$marche = new Marche();
    	$param = $request->all();

    	$marche->year = $param['year'];
    	$marche->type_budget = $param['type_budget'];
    	$marche->objet = $param['objet'];
    	$marche->montant= $param['montant'];
        $date_ouverture_plis = new Carbon($param['date_ouverture_plis']);
        $date_debut_travaux = new Carbon($param['date_debut_travaux']);
        $marche->date_ouverture_plis = $date_ouverture_plis;
    	$marche->date_debut_travaux = $date_debut_travaux;
    	$date_fin_travaux = new Carbon($param['date_debut_travaux']);
        $date_fin_travaux->addDays(intval($param['duree']));
        $marche->date_fin_travaux = $date_fin_travaux;
        $marche->labo_id = $param['labo_id'];
        $marche->societe_id = $param["societe_id"];
        $marche->archi_id = $param['archi_id'];
        $marche->bet_id = $param['bet_id'];
        $marche->maitre_ouvrage_id = $param['maitre_ouvrage_id'];
        $marche->sum_decomptes = 0;
        $marche->percentage_financial = 0;
        $marche->pourcentage_travaux = 0;
        $marche->archive=0;
        $marche->save();

        return 1;
    }


    public function postImage(Request $req)
    {
        $this->r = $req;
        
        return Plupload::receive('file', function ($file)
            {
                $file->move(storage_path() . '/images/', $this->r->all()["flowFilename"]);
                return 'ready';
            });
    }
    
    public function getDecomptes($id)
    {
        return Decompte::where('marche_id',$id)->get();
    }
    public function getAvenants($id)
    {
        return Avenant::where('marche_id',$id)->get();
    }

    public function addDecompte(Request $req){

        $param = $req->all();
        $decompte = new Decompte();
        $decompte->marche_id = $param['marche_id'];
        $decompte->montant = $param['montant'];
        $decompte->save();

        return $decompte;

    }

    public function deleteDecompte($id)
    {   //var_dump($id);
        try {
            Decompte::find($id)->delete();
            return 200;
        } catch (Exception $e) {
            var_dump($e);
        }
        return 500;
    }
    public function deleteAvenant($id)
    {
        try{
            Avenant::find($id)->delete();
            return 200;

        }catch(Exception $e){
            var_dump($e);
        }
        return 500;
    }
    public function addAvenant(Request $req)
    {
            $param = $req->all();
            $av = new Avenant();
            $av->marche_id = $param['marche_id'];
            $av->objet = $param['objet'];
            $av->montant = $param["montant"];
            $av->save();

            return $av;
    }

	 public function downloadPdf($id)
     {

        $m = Marche::find($id);
        $d = Decompte::where('marche_id',$id)->get();
        $a = Avenant::where('marche_id',$id)->get();
        $labo = Laboratoire::where('id',$m->labo_id)->first();
        $societe = Societe::where('id',$m->societe_id)->first();
        $bet = BET::where('id',$m->bet_id)->first();
        $maitre = Maitre_ouvrage::where('id',$m->maitre_ouvrage_id)->first();  
        /*si la collection decomptes {d} est nulle*/
        if(is_null($d)){
            $decomptes = "";
        }
        /*sinon */
        else{

            $decomptes = "";

            foreach ($d as $key => $value) {

                $decomptes .= "<tr><td>Decompte N° ".($key+1) ."</td><td> ".$value['montant']."Dhs </td></tr>";

            }
        }
        /*si la collection avenants {a} est nulle*/
        if(is_null($a)){

            $avenant = "";
        }

        else{

            $avenant = "";

            foreach ($a as $key => $value) {

                $avenant .="<tr><td> Objet de l'avenant : ".$value['objet']."</td><td> Montant : ".$value['montant']." DHs</td></tr>";

            }
        }
        $content = "<!DOCTYPE html>
                        <html lang='en'>
                            <head>
                                <meta charset='utf-8'>
                                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                                    <link rel='stylesheet' href='http://bootswatch.com/paper/bootstrap.min.css'>
                            </head>
                            <body>
                                <div class='container'>
                                    <div class='panel panel-success'>
                                        <div class='panel-heading'>Marché Numéro : ".$m->id."</div>
                                        <div class='panel-body'>
                                           <table class='table table-striped'>
                        <tr>
                            <td>Numéro du Marché : </td><td>".$m->id."<td>
                        </tr>
                        <tr>
                            <td>Type du Marché : </td><td>".$m->type_budget."<td>
                        </tr>
                        <tr>
                            <td>Objet du marché : </td><td>".$m->objet."<td>
                        </tr>
                        <tr>
                            <td>Montant du Marché : </td><td>".$m->montant."<td>
                        </tr>
                        <tr>
                            <td>Date d'ouverture des plis : </td><td>".$m->date_ouverture_plis."<td>
                        </tr>
                        <tr>
                            <td>Date début des travaux : </td><td>".$m->date_debut_travaux."<td>
                        </tr>
                        <tr>
                            <td>Date fin des travaux : </td><td>".$m->date_fin_travaux."<td>
                        </tr>
                        <tr>
                            <td>Societe en charge du marché : </td><td>".$societe->name_societe."<td>
                        </tr>
                        <tr>
                            <td>Laboratoire en charge du marché: </td><td>".$labo->name_labo."<td>
                        </tr>
                        <tr>
                            <td>Bureau d'études en charge du marché: </td><td>".$bet->name_bet."<td>
                        </tr>
                        <tr>
                            <td>Maitre d'ouvrage en charge du marché: </td><td>".$maitre->name_maitre_ouvrage."<td>
                        </tr>
                        <tr>
                            <td>Bureau d'études en charge du marché: </td><td>".$bet->name_bet."<td>
                        </tr>"
                       .$decomptes.$avenant."
                            </table>
                                        </div>
                                    </div>
                                </div>
                            </body>
                        </html>";
       
                       $pdf = App::make('snappy.pdf.wrapper');
                        $pdf->loadHTML($content);
                        return $pdf->download("marche__".$m->id.".pdf");
    }
}
?>
