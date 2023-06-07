<?php

use App\Http\Controllers\QuestaoController;

use App\Http\Controllers\FigurinhaController;

use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::resource('figurinhas', FigurinhaController::class)->only([
    'create','store','edit','update','destroy'
])->middleware('admin');

Route::resource('figurinhas', FigurinhaController::class)->only([
    'index', 'show'
])->middleware('auth');

Route::resource('questoes', QuestaoController::class)->only([
    'create','store','edit','update','destroy'
])->middleware('admin');

Route::resource('questoes', QuestaoController::class)->only([
    'index', 'show'
])->middleware('auth');

Route::post('/questoes/validate', [QuestaoController::class,'validateQuizz'])->name('questoes.validate')->middleware('admin');

Route::get('/dashboard/figurinhas', [FigurinhaController::class,'dashboard'])->name('dashboard.figurinhas')->middleware('admin');

Route::get('/dashboard/questoes/{id}', [QuestaoController::class,'dashboard'])->name('dashboard.questoes')->middleware('admin');

Route::get('/personagens', [FigurinhaController::class,'personagens'])->name('personagens')->middleware('auth');

Auth::routes();