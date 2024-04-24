<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Livewire\RegisterPost;
use Illuminate\Routing\RouteGroup;

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
});
