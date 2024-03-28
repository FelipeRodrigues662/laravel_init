<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empresa', function(){
    return view('site/empresa');
});

Route::any('/any', function(){
    return "Todas os verbos Http";
});

Route::match(['get', 'post'],'/match', function(){
    return "Apenas métodos permitidos";
});

Route::get('/produto/{id}', function($id){
    return "O id do produto é: " .$id;
});