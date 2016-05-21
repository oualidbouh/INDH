<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Laboratoire;
class LaboratoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->all();
        $labo = new Laboratoire();
        $labo->name_labo = $param['name_labo'];
        $labo->tel_labo = $param['tel_labo'];
        $labo->fax_labo = $param['fax_labo'];
        $labo->email_labo = $param['email_labo'];
        $labo->adresse_labo = $param['adresse_labo'];
        $labo->save();
        return \Response::make('ok',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllLaboratoires(){

        $labo = new Laboratoire();
        $datas = $labo->lists('labo_id','name_labo');
        $labos =array();
        foreach($datas as $data => $value){
            /*Creer objet JSON*/
           $labos[]=array("id"=>$value,"name"=>$data);
        }
        /*retourne tous les labos*/
    return $labos;
        
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
