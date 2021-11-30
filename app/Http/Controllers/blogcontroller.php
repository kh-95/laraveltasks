<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\blog;

class blogcontroller extends Controller
{
    


    public function index(){


       $data=blog::orderby('id','desc')->get();


      return view ('blogview',["data"=>$data]);


    }



    public function create (){

        return view('blog');
      }



    public function store(Request $request){

        $data=$request->validate([
           'title' => 'required|string',
           'content' => 'required|max:50',
           'code' => 'required|int',
          
        ]);

$op=blog::create($data);
   
   if($op){

    echo 'raw inserted';
}else{


    echo " error ! try again ";


}

return  redirect(url('/blog'));
   

    }




public function delete($id)
{

    $blog=blog::find($id);

   $blog->delete();



  return redirect(url('/blog'));


}





}
