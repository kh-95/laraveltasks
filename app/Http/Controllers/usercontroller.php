<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{


  public function __construct(){
       
    $this->middleware('CheckLogin',['except' => ['login','doLogin','create','store']]);

 }





 
  public function create (){

    return view('register');
  }

  public function store(Request $request){

     $inputs=$request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|min:6',
       
]);




  

  $inputs['password'] = Hash::make($request->password);


 $op= User::create($inputs);
 if($op){



  return redirect(url('/login'));

 }else{

  echo "operation failed try again";
 }
    

}

public function login(){
  return view('login');
}



public function doLogin(Request $request){

   $data = $this->validate($request,[
            "email"    => "required|email",
            "password" => "required|min:6"
        
   ]);

   // logic login .... 

   if(Auth::attempt($data)){

    

         return redirect(url('/tasks'));
   }else{
     return redirect(url('/login'));
   }


}


public function logOut(){

  Auth::logout();
   return redirect(url('/login'));
}





}