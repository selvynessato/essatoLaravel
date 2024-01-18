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
//use App\Models\Departamento;

Route::get('/', function () {
   
  /*  $departamentos = Departamento::all();

    foreach ($departamentos as $departamento) {
       echo $departamento->id_departamento."<br/>";
       echo $departamento->nombre_departamento."<br/>"."<hr>";
    }
    die();*/
    return view('welcome');   
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
