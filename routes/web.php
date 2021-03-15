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

Route::get('/user', [App\Http\Controllers\PainelController::class, 'Dashboard'])->name('admin');

Route::get('/user/login', [App\Http\Controllers\UserController::class, 'index'])->name('user.login.index');
Route::post('/user/login', [App\Http\Controllers\UserController::class, 'login'])->name('user.login');
Route::get('/user/register', [App\Http\Controllers\UserController::class, 'create'])->name('user.register.index');
Route::post('/user/register', [App\Http\Controllers\UserController::class, 'store'])->name('user.register');


Route::get('/despesas/novo',[App\Http\Controllers\DespesasController::class, 'create'])->name('despesas.create.index');
Route::post('/despesas/novo',[App\Http\Controllers\DespesasController::class, 'store'])->name('despesas.create');
Route::get('/despesas/remover/{id}',[App\Http\Controllers\DespesasController::class, 'destroy'])->name('despesas.remover');
Route::get('/despesas/editar/{id}',[App\Http\Controllers\DespesasController::class, 'edit'])->name('despesas.edit');
Route::post('/despesas/{id}',[App\Http\Controllers\DespesasController::class, 'update'])->name('despesas.atualizar');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
