<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class studentcontroller extends Controller
{


public function index(){

    $data=student::orderby('id','desc')->get();

  

    return view ('student',["data"=>$data]);


}





public function create(){

return view('registerstd');
}

public function store(Request $request){

    $inputs=$request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'image' => 'required|file',
]);

$inputs = $request->except(['password','image','_token']);

if($request->hasFile('image'))
{           
  $inputs['image']= $request->file('image')->getClientOriginalName();
 
  $path = $request->file('image')->store('public/imagesstudent');

  

  $inputs['password'] = Hash::make($request->password);


}

$op= student::create($inputs);

if($op){

    return redirect('/student');
}else{

    return redirect(url('/store/student'));
}
}

public function edit($id){

    $data = student::find($id);

    return view('edit',['data' => $data]);
}

public function update(Request $request){

        
     $this->validate($request,
    [    
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'image' => 'required|file',
      ]);

      $inputs = $request->except(['password','image','_token']);
if($request->hasFile('image')){

    $inputs['image']= $request->file('image')->getClientOriginalName();
 
    $path = $request->file('image')->store('public/imagesstudent');
  
    
  
    $inputs['password'] = Hash::make($request->password);


   $op =  student::where('id',$request->id)->update($inputs);



}

   if($op){
     
    //  unlink('storage/imagesstudent/'.basename($path));

    return redirect(url('/student'));
   }else{
     $message = "Error Try Again";
   }
   
  

   


 }












public function delete($id)
{

    $student=student::find($id);

    // dd($student);

   $op=$student->delete();

   if($op){

unlink('storage/imagesstudent/'.$student->image);

  return redirect(url('/student'));

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

        return redirect(url('/student'));
   }else{
     return redirect(url('/login'));
   }


}


public function logOut(){

  Auth::logout();
   return redirect(url('/login'));
}





}
