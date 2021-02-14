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



Route::get('/add', 'ArticleController@add');
Route::get('/', 'ArticleController@show');
Route::post('/add_process', 'ArticleController@add_process');
Route::get('/detail/{id}', 'ArticleController@detail');
Route::get('/admin', 'ArticleController@show_by_admin');
Route::get('/edit/{id}', 'ArticleController@edit');
Route::post('/edit_process', 'ArticleController@edit_process');
Route::get('/delete/{id}', 'ArticleController@delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
