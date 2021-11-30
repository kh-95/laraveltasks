<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

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

        
    $data = $this->validate($request,
    [    
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'image' => 'required|file',
      ]);
if($request->hasFile('image')){

    $name= $request->file('image')->getClientOriginalName();
 
    $path = $request->file('image')->store('public/imagesstudent');
  
    
  
    $inputs['password'] = Hash::make($request->password);


   $op =  student::where('id',$request->id)->update($data);



}

   if($op){
     
    // unlink('storage/imagesstudent/'.$data->image);

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






}
