<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productoController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\imagenController;
use App\Http\Controllers\pedidosController;
use App\Http\Controllers\empleadoController;
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

Route::get('/', function () {
	// ya no redirige al welcome layout
    // return view('welcome');
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

 
Route::resource('moneda','App\Http\Controllers\MonedaController');

Route::resource('empleado', empleadoController::class)->middleware('auth');
//Route::resource ('categoria', 'categoriaController', ['parameters' => ['categoria' => 'categoria']]);
//KG: Esta línea se modificó para corregir el inconveniente ia - ium en nombre categoria
Route::resource('categoria', categoriaController::class,['parameters' => ['categoria' => 'categoria']])->middleware('auth');

Route::resource('producto', productoController::class)->middleware('auth');

Route::resource('marca',MarcaController::class)->middleware('auth');

Route::resource('proveedor',ProveedorController::class)->middleware('auth');

Route::resource('pedidos',pedidosController::class)->middleware('auth');

Route::get('/producto/{id}/imagen', 'App\Http\Controllers\imagenController@index');
Route::get('/producto/{id}/imagen/create', 'App\Http\Controllers\imagenController@create');
Route::post('/producto/{id}/imagen/store', 'App\Http\Controllers\imagenController@store');
Route::get('/producto/{id}/imagen/{idImg}/edit', 'App\Http\Controllers\imagenController@edit');
Route::post('/producto/{id}/imagen/{idImg}/edit', 'App\Http\Controllers\imagenController@update');