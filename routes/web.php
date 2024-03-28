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

//Todos os verbos Http
Route::any('/any', function(){
    return "Todas os verbos Http";
});

//Escolhe mais de um método Http para essa rota
Route::match(['get', 'post'],'/match', function(){
    return "Apenas métodos permitidos";
});

//Passagem de parametros
Route::get('/produto/{id}', function($id){
    return "O id do produto é: " .$id;
});

Route::get('/notPermission/{id}', function($id){
    return "O Id: ".$id." não é permitido.";
});

//Redirect
Route::prefix('sobre')->group(function(){
    Route::get('/idEmpresa/{id}', function($id){

        if($id > 100){
            return redirect('/produto'.'/'.$id);
        }
        else
            return redirect('/notPermission'.'/'.$id);
    });
});


// Route::redirect('/empresa', '/site/empresa');
// Route::view('/empresa', '/site/empresa');

Route::get('/news', function(){
    return view('news');
})->name('noticias');

Route::get('/novidades', function () {
    return redirect()->route('noticias');
});


Route::group([
    'prefix'=> 'admin',
    'as'=>'admin.'
], function(){
    Route::get('user', function(){
        return "User";
    })->name('userTeste');
});