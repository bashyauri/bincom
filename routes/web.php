<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollingController;
use App\Http\Controllers\ResultController;

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
// This will create the CRUD functions index,show,store,update and destroy
Route::resource('polls',PollingController::class);
// This will create the CRUD functions index,show,store,update and destroy
Route::resource('results',ResultController::class);
// Select LGA Route
Route::get('lga',[PollingController::class,'selectLGA'])->name('lga');
Route::post('score',[PollingController::class,'lgaScores'])->name('lga.scores');