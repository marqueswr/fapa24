<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlunoController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/aluno-basico-index', [AlunoController::class, 'index'])->name('aluno.basico.index');
Route::get('/aluno-basico-create', [AlunoController::class, 'create'])->name('aluno.basico.create');
Route::post('/aluno-basico-store', [AlunoController::class, 'store'])->name('aluno.basico.store');
Route::delete('/aluno-basico-destroy/{aluno}', [AlunoController::class, 'destroy'])->name('aluno.basico.destroy');
Route::get('/aluno-edit/{aluno}', [AlunoController::class, 'edit'])->name('aluno.basico.edit');
Route::put('/aluno-update/{aluno}', [AlunoController::class, 'update'])->name('aluno.basico.update');
