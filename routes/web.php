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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UserControl::class, 'getUsers']);
Route::resource('visiteurs','App\Http\Controllers\PersonnelController');  
Route::resource('visites','App\Http\Controllers\VisiteController');  
Route::resource('listevisite', 'App\Http\Controllers\listevisiteController'); //route controller affichant liste visite et edition bilan
Route::resource('creevisite', 'App\Http\Controllers\CreateVisiteController'); //route controller permentant de récupérer l'id du visiteur selectioné pour lui créé une visite
Route::resource('activite', 'App\Http\Controllers\ActiviteController');
