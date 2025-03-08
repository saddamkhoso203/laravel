<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signup(Request $request){
        $validateUser = Validator::make($request->all(),['name'=>'required','email'=> 'required
        email unique:users,email', 'password'=> 'required'])

    }
    public function login(Request $request){

    }
    public function logout(Request $request){

    }
    
}
