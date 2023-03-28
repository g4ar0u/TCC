<?php

use App\Http\Controllers\QuizzController;

use App\Http\Controllers\FigurinhaController;

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

Route::resource('figurinhas', FigurinhaController::class); 

Route::resource('quizzes', QuizzController::class);
