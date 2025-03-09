<?php

namespace App\Http\Controllers\API;
use App\Models\User; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function signup(Request $request){

$validateUser = Validator::make($request->all(),[
    'name'=>'required',
    'email'=>'required|email|unique:users',
    'password'=>'required',
]);
if($validateUser->fails()){

 return response()->json([

    'status'=>false,
    'message'=>'validation error',
    'errors'=>$validateUser->errors()->all(),
 ],401);


}

$user = User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>$request->password,

]);

return response()->json([

    'status'=>true,
    'message'=>'User Created SuccessFully',
'user'=>$user,
 ],200);
}



    public function login(Request $request){


                                                            
$validateUser = Validator::make($request->all(),[

    'email'=>'required|email',
    'password'=>'required',
]);

if($validateUser->fails()){

    return response()->json([
   
       'status'=>false,
       'message'=>'Authentication Error',
       'errors'=>$validateUser->errors()->all(),
    ],404);

    }    

if(Auth::attempt(['email'=>$request->email,
'password'=>$request->password,])){   
$authuser =Auth::user();
    return response()->json([

        'status'=>true,
        'message'=>'User Logined SuccessFully',
'Token'=>$authuser->createToken($authuser->email)->plainTextToken,
    'Token_type'=>'bearer',
     ],200);


}else{

    return response()->json([
   
        'status'=>false,
        'message'=>'Emial and password does not match',
        
     ],401);

}


}











    public function logout(Request $request){

        $user = $request->user();
        $user->tokens()->delete();
 
 
 
        return response()->json([

            'status'=>true,
            'user'=>$user,
            'message'=>'you Logour SuccessFully',
         ],200);
    }
    
    

}