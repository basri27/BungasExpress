<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Livewire\RegisterPost;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (){
    return view('index');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('regist');
    Route::get('/login', 'login')->name('login');
    Route::post('/register-save', 'registerSave')->name('registerSave');
    Route::post('/login-action', 'loginAction')->name('loginAction');
    Route::get('/logout','logout')->name('logout');
});

Route::controller(UsersController::class)->group(function() {
    Route::get('/dashboard}', 'dashboard')->name('dashboard');
    Route::get('/profile', 'profile')->name('profil');
    Route::get('/data-barang', 'dataBarang')->name('barang');
    Route::get('get-all-data-barang', 'allBarang')->name('allBarang');
    Route::get('get-barang-today', 'barangToday');
    Route::get('/data-pelanggan', 'dataPelanggan')->name('pelanggan');
    Route::get('get-all-data-pelanggan', 'allPelanggan')->name('allPelanggan');
});
