<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\OrdinateurController;
use App\Http\Controllers\SeanceController;

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

Route::get('/', [SalleController::class, 'index']);

Route::resource('salles', SalleController::class);
Route::resource('etudiants', EtudiantController::class);
Route::resource('enseignants', EnseignantController::class);
Route::resource('ordinateurs', OrdinateurController::class);
Route::resource('seances', SeanceController::class);
