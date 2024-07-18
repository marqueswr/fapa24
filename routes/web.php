<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\SalaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/aluno-basico-index', [AlunoController::class, 'index'])->name('aluno.basico.index');
Route::get('/aluno-basico-create', [AlunoController::class, 'create'])->name('aluno.basico.create');
Route::post('/aluno-basico-store', [AlunoController::class, 'store'])->name('aluno.basico.store');
Route::delete('/aluno-basico-destroy/{aluno}', [AlunoController::class, 'destroy'])->name('aluno.basico.destroy');
Route::get('/aluno-basico-edit/{aluno}', [AlunoController::class, 'edit'])->name('aluno.basico.edit');
Route::put('/aluno-basico-update/{aluno}', [AlunoController::class, 'update'])->name('aluno.basico.update');

Route::get('/sala-index', [SalaController::class, 'index'])->name('sala.index');
Route::get('/sala-create', [SalaController::class, 'create'])->name('sala.create');
Route::post('/sala-store', [SalaController::class, 'store'])->name('sala.store');
Route::delete('/sala-destroy/{sala}', [SalaController::class, 'destroy'])->name('sala.destroy');
Route::get('/sala-edit/{sala}', [SalaController::class, 'edit'])->name('sala.edit');
Route::put('/sala-update/{sala}', [SalaController::class, 'update'])->name('sala.update');
