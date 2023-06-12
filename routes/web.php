<?php

use App\Http\Controllers\PostController;
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
//q2
Route::get('q2',[PostController::class,'q2']);

//q3
Route::get('/q3',[PostController::class,'q3']);

//q4
Route::get('/q4/{id}',[PostController::class,'q4']);

//q5
Route::get('/q5/{id}',[PostController::class,'q5']);


//q6
Route::get('/q6/{id}',[PostController::class,'q6Find']);
Route::get('/q6',[PostController::class,'q6First']);

//q7
Route::get('/q7',[PostController::class,'q7']);

//q8
Route::post('/q8',[PostController::class,'q8']);

//q9
Route::get('/q9/{id}',[PostController::class,'q9']);

//q10
Route::get('/q10{id}',[PostController::class,'q10']);

//q11
Route::get('/q11',[PostController::class,'q11']);

//q12
Route::get('/q12',[PostController::class,'q12']);

//q13
Route::get('/q13Exists',[PostController::class,'q13Exists']);
Route::get('/q13DoesntExist',[PostController::class,'q13DoesntExist']);

//q14
Route::get('/q14',[PostController::class,'q14']);

//q15
Route::get('/q15/{id}',[PostController::class,'q15']);