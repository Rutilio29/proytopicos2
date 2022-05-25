<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('auth/login');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registro_usuario', function () {});
Route::get('/detalle_usuario', function () {});
Route::get('/alta_usuario', function () {});
Route::get('/detalle_productos', function () {});
Route::get('/acerca_de', function () {});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
Route::get('/usuario', 'App\Http\Controllers\UserController@user')->name('user');
Route::post('/usuario/crear', 'App\Http\Controllers\UserController@store')->name('user.store');
Route::get('/usuario/crear', 'App\Http\Controllers\UserController@create_user')->name('user.create');

Route::get('/usuario/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('user.edit');
Route::get('/usuario/detalles/{id}', 'App\Http\Controllers\UserController@detalles')->name('user.detalles');
Route::post('/usuario/update/{id}', 'App\Http\Controllers\UserController@update')->name('userio.update');

Route::delete('/usuarios/delete/{id}', 'App\Http\Controllers\UserController@delete')->name('usuarios.delete');

Route::get('/cliente', 'App\Http\Controllers\DetalleClienteController@cliente')->name('cliente');
Route::post('/cliente/crear', 'App\Http\Controllers\DetalleClienteController@store')->name('cliente.store');
Route::get('/cliente/crear', 'App\Http\Controllers\DetalleClienteController@create_cliente')->name('cliente.create');

Route::get('/cliente/edit/{id}', 'App\Http\Controllers\DetalleClienteController@edit')->name('cliente.edit');
Route::get('/cliente/detalles/{id}', 'App\Http\Controllers\DetalleClienteController@detalles')->name('cliente.detalles');
Route::post('/cliente/update/{id}', 'App\Http\Controllers\DetalleClienteController@update')->name('cliente.update');

Route::delete('/clientes/delete/{id}', 'App\Http\Controllers\DetalleClienteController@delete')->name('clientes.delete');


Route::get('/producto', 'App\Http\Controllers\DetalleProductoController@producto')->name('producto');
Route::post('/producto/crear', 'App\Http\Controllers\DetalleProductoController@store')->name('producto.store');
Route::get('/producto/crear', 'App\Http\Controllers\DetalleProductoController@create_producto')->name('producto.create');

Route::get('/producto/edit/{id}', 'App\Http\Controllers\DetalleProductoController@edit')->name('producto.edit');
Route::get('/producto/detalles/{id}', 'App\Http\Controllers\DetalleProductoController@detalles')->name('producto.detalles');
Route::post('/producto/update/{id}', 'App\Http\Controllers\DetalleProductoController@update')->name('producto.update');

Route::delete('/producto/delete/{id}', 'App\Http\Controllers\DetalleProductoController@delete')->name('productos.delete');


Route::get('/provedores', 'App\Http\Controllers\DetalleProveedorController@provedor')->name('provedores');
Route::post('/provedor/crear', 'App\Http\Controllers\DetalleProveedorController@store')->name('provedor.store');
Route::get('/provedor/crear', 'App\Http\Controllers\DetalleProveedorController@create_provedores')->name('provedor.create');

Route::get('/provedor/edit/{id}', 'App\Http\Controllers\DetalleProveedorController@edit')->name('provedor.edit');
Route::get('/provedor/detalles/{id}', 'App\Http\Controllers\DetalleProveedorController@detalles')->name('provedor.detalles');
Route::post('/provedor/update/{id}', 'App\Http\Controllers\DetalleProveedorController@update')->name('provedor.update');

Route::delete('/provedor/delete/{id}', 'App\Http\Controllers\DetalleProveedorController@delete')->name('provedores.delete');

Auth::routes();

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

