<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Maitre_ouvrage;
class MaitreOuvrageController extends Controller
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
/*Insertion des données saisies dans le formulaire d'ajout des Maitres d'ouvrage*/
        $param = $request->all();
        $maitre = new Maitre_ouvrage();
        $maitre->name_maitre_ouvrage = $param['name_maitre_ouvrage'];
        $maitre->tel_maitre_ouvrage=$param['tel_maitre_ouvrage'];
        $maitre->fax_maitre_ouvrage=$param['fax_maitre_ouvrage'];
        $maitre->email_maitre_ouvrage=$param['email_maitre_ouvrage'];
        $maitre->adresse_maitre_ouvrage=$param['adresse_maitre_ouvrage'];
        $maitre->save();
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
