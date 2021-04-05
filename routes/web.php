<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/', [PainelController::class, 'auth'])->name('auth');

Route::get('/user/login', [UserController::class, 'index'])->name('user.login.index');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::get('/user/register', [UserController::class, 'create'])->name('user.register.index');
Route::post('/user/register', [UserController::class, 'store'])->name('user.register');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');


Route::get('/despesas/novo',[DespesasController::class, 'create'])->name('despesas.create.index')->middleware('auth');
Route::post('/despesas/novo',[DespesasController::class, 'store'])->name('despesas.create')->middleware('auth');
Route::post('/despesas/{id}',[DespesasController::class, 'update'])->name('despesas.atualizar')->middleware('auth');
Route::get('/despesa/{id}/delete',[DespesasController::class, 'delete'])->name('despesa.delete')->middleware('auth');
Route::get('/despesas/{id}/edit',[DespesasController::class, 'edit'])->name('despesas.edit.index')->middleware('auth');
Route::post('/despesas/{id}/edit',[DespesasController::class, 'update'])->name('despesas.edit')->middleware('auth');

Route::get('/categoria/novo',[CategoriaController::class, 'create'])->name('categoria.create.index')->middleware('auth');
Route::post('/categoria/novo',[CategoriaController::class, 'store'])->name('categoria.create')->middleware('auth');
Route::get('/categoria/index',[CategoriaController::class, 'index'])->name('gerenciar.categoria')->middleware('auth');
Route::get('/categoria/{id}/delete',[CategoriaController::class, 'delete'])->name('categoria.delete')->middleware('auth');


Route::get('/Dashboard',[PainelController::class, 'Dashboard'])->name('dashboard.index')->middleware('auth');




