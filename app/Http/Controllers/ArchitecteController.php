<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Response;
use App\Architecte;
class ArchitecteController extends Controller
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
        /*
        \DB::table('architectes')->insert(
            array('name_archi' => $param['name_archi'], 'tel_archi' => $param['tel_archi'],
                'fax_archi'=>$param['fax_archi'],
                'email_archi'=>$param['email_archi'],
                'adresse_archi'=>$param['adresse_archi'])
        );*/
        $archi = new Architecte();
        $archi->name_archi = $param['name_archi'];
        $archi->tel_archi=$param['tel_archi'];
        $archi->fax_archi=$param['fax_archi'];
        $archi->email_archi=$param['email_archi'];
        $archi->adresse_archi=$param['adresse_archi'];
        $archi->save();
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
