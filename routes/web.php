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

Route::get('/', [App\Http\Controllers\PainelController::class, 'auth'])->name('auth');

Route::get('/user/login', [App\Http\Controllers\UserController::class, 'index'])->name('user.login.index');
Route::post('/user/login', [App\Http\Controllers\UserController::class, 'login'])->name('user.login');
Route::get('/user/register', [App\Http\Controllers\UserController::class, 'create'])->name('user.register.index');
Route::post('/user/register', [App\Http\Controllers\UserController::class, 'store'])->name('user.register');
Route::get('/user/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('user.logout');


Route::get('/despesas/novo',[App\Http\Controllers\DespesasController::class, 'create'])->name('despesas.create.index')->middleware('auth');
Route::post('/despesas/novo',[App\Http\Controllers\DespesasController::class, 'store'])->name('despesas.create')->middleware('auth');
Route::post('/despesas/{id}',[App\Http\Controllers\DespesasController::class, 'update'])->name('despesas.atualizar')->middleware('auth');
Route::get('/despesa/{id}/delete',[App\Http\Controllers\DespesasController::class, 'delete'])->name('despesa.delete')->middleware('auth');
Route::get('/despesas/{id}/edit',[App\Http\Controllers\DespesasController::class, 'edit'])->name('despesas.edit.index')->middleware('auth');
Route::post('/despesas/{id}/edit',[App\Http\Controllers\DespesasController::class, 'update'])->name('despesas.edit')->middleware('auth');

Route::get('/Dashboard',[App\Http\Controllers\PainelController::class, 'Dashboard'])->name('dashboard.index')->middleware('auth');
Route::get('/index',[App\Http\Controllers\PainelController::class, 'index'])->name('index.index')->middleware('auth');




