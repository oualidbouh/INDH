<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class UserController extends Controller
{
    public function addUser(Request $request){
    	$param = $request->all();
    	$user = new User();
    	$user->email = $param['email'];
    	$user->name = $param['name'];
    	$user->password = $param['password'];
    	$user->type = $param['type'];
    	$user->save();
    	return 'saved';
    }

    public function getUsers(){
    	return User::all();
    }

    public function updateUser(Request $request){

    	$param = $request->all();
        var_dump($param);
        $user = User::find($param['id']);
        $user->name = $param['name'];
        $user->email = $param['email'];
        $user->password = $param['password'];
        $user->type = $param['type'];
        $user->update();
        return 'done';

    }
}