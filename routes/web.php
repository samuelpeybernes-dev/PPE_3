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
Route::resource('visites','App\Http\Controllers\VisiteurController');  
Route::resource('listevisite', 'App\Http\Controllers\listevisiteController');
Route::resource('creevisite', 'App\Http\Controllers\CreateVisiteController');
