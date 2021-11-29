<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
  public function message ($id,$name){

    echo "Test Message From Lravel Route File id = ".$id.' & Name = '.$name;


  }
  public function create (){

    return view('register');
  }

  public function store(Request $request){

     $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'address' => 'required|max:10',
        'gender' => 'required',
        'linkedin' => 'required|url',
        'image' => 'required|file',
]);


$inputs = $request->except(['password','image','_token']);

if($request->hasFile('image'))
{           
  $name= $request->file('image')->getClientOriginalName();
 
  $inputs['image']= $request->file('image')->store('public/images');

  

  $inputs['password'] = Hash::make($request->password);
}

    // dd($data);

    return view ('profile',["dataprofile"=> $inputs]);

}


}