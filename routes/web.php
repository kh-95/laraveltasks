<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('Message/{id}/{name}','usercontroller@message');

   
Route::get('create','usercontroller@create');

Route::post('store','usercontroller@store');

//blog


Route::get('create/blog','blogcontroller@create');

Route::post('store/blog','blogcontroller@store');

Route::get('blog','blogcontroller@index');

Route::get('delete/{id}','blogcontroller@delete');

// student

Route::get('create/student','studentcontroller@create');

Route::post('store/student','studentcontroller@store');

Route::get('student','studentcontroller@index');

Route::get('delete/{id}','studentcontroller@delete');

Route::get('edit/{id}','studentcontroller@edit');

Route::post('update','studentcontroller@update');



