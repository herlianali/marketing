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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/pending', [App\Http\Controllers\HomeController::class, 'pending']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('marketing', App\Http\Controllers\MarketingController::class)->middleware('auth');

Route::resource('pelanggan', App\Http\Controllers\PelangganController::class)->middleware('auth');

Route::resource('intensif', App\Http\Controllers\IntensifController::class)->middleware('auth');

Route::resource('gaji', App\Http\Controllers\GajiController::class)->middleware('auth');
Route::resource('paket', App\Http\Controllers\PaketController::class)->middleware('auth');

Route::resource('finansial', App\Http\Controllers\FinansialController::class)->middleware('auth');
Route::get('/approve/{id}',[App\Http\Controllers\IntensifController::class,'approve'])->middleware('auth');
Route::get('/reject/{id}',[App\Http\Controllers\IntensifController::class,'reject'])->middleware('auth');


Route::get('logout', function (){
    Auth::logout();
    return redirect('/');
})->name('logout');
