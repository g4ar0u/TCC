<?php

use App\Http\Controllers\QuestaoController;

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
    return view('figurinhas.index',['figurinhas' => App\Models\Figurinha::all()] );
});

Route::resource('figurinhas', FigurinhaController::class); 

Route::resource('questoes', QuestaoController::class);

Route::post('/questoes/validate', [QuestaoController::class,'validateQuizz'])->name('questoes.validate');
