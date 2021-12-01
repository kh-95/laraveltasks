<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    






    public function index()
    {
      // $user_id=auth()->user()->id ;


       $data = DB::table('tasks')->where('user_id', Auth::id())->get();





return view('Tasks.index', ['data' => $data]);




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $inputs=$request->validate([
            'title' => 'required|string',
            'description' => 'required|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'user_id'=>'required|numeric',
           
         ]);
 

$op= task::create($inputs);

if ($op) {
    $message = 'Raw Inserted';
} else {
    $message = 'Error Try Again';
}

session()->flash('Message', $message);

return redirect(url('/Tasks'));




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
        $data = task::find($id);

        return view('Tasks.edit',['data' => $data]);
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
        
        $inputs=$request->validate([
            'title' => 'required|string',
            'description' => 'required|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            
           
         ]);

         $op = Task::where('id', $id)->update($inputs);

         if ($op) {
             $message = 'Raw Updated';
         } else {
             $message = 'Error Try Again';
         }
 
         session()->flash('Message', $message);
 
         return redirect(url('/Tasks'));









    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $op = task::where('id', $id)->delete();

        if ($op) {
            $message = 'Raw Removed';
        } else {
            $message = 'Error Try Again';
        }
        session()->flash('Message', $message);

        return redirect(url('/Tasks'));
    }
}
