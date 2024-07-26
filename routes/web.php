<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EnderecoController;

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

Route::get('/contato-index', [ContatoController::class, 'index'])->name('contato.index');
Route::get('/contato-create', [ContatoController::class, 'create'])->name('contato.create');
Route::post('/contato-store', [ContatoController::class, 'store'])->name('contato.store');
Route::delete('/contato-destroy/{contato}', [ContatoController::class, 'destroy'])->name('contato.destroy');
Route::get('/contato-edit/{contato}', [ContatoController::class, 'edit'])->name('contato.edit');
Route::put('/contato-update/{contato}', [ContatoController::class, 'update'])->name('contato.update');

Route::get('/endereco-index', [EnderecoController::class, 'index'])->name('endereco.index');
Route::get('/endereco-create', [EnderecoController::class, 'create'])->name('endereco.create');
Route::post('/endereco-store', [EnderecoController::class, 'store'])->name('endereco.store');
Route::delete('/endereco-destroy/{endereco}', [EnderecoController::class, 'destroy'])->name('endereco.destroy');
Route::get('/endereco-edit/{endereco}', [EnderecoController::class, 'edit'])->name('endereco.edit');
Route::put('/endereco-update/{endereco}', [EnderecoController::class, 'update'])->name('endereco.update');
