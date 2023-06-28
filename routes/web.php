<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    echo "Selamat Datang di laravel";
});

route::get('/greeting', function () {
    return view('greeting');
});

Route::get('/welcome', function () {
    return view('greeting');
});
Route::middleware(['auth'])->group(function (){
    route::get('/mobil', [MobilController::class, 'index']);
    route::get('/mobil/create', [MobilController::class, 'create']);
    route::post('/mobil/simpan-data', [MobilController::class, 'store']);

    Route::get('/merk', [merkController::class, 'index']);
    Route::get('/merk/create',[merkController::class,'create']);
    Route::Post('/merk/simpan-data',[merkController::class,'store']);

    Route::get('/merk/edit/{id}', [merkController::class, 'edit']);
    Route::post('/merk/update/{id}', [merkController::class, 'update']);
    Route::get('/merk/delete/{id}', [merkController::class, 'delete']);

    Route::get('/tipemobil', [TipeMobilController::class, 'index']);
    Route::get('/tipemobil/create', [TipeMobilController::class, 'create']);
    Route::post('/tipemobil/simpan-data', [TipeMobilController::class, 'store']);
    Route::get('/tipemobil/edit/{id}', [TipeMobilController::class, 'edit']);
    Route::post('/tipemobil/update/{id}', [TipeMobilController::class, 'update']);
    Route::get('tipemobil/delete/{id}', [TipeMobilController::class, 'delete']);
    Route::get('/logout',[Auth\LoginController::class, 'logout']);
});

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/simpan-data', [UserController::class, 'store']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('user/delete/{id}', [UserController::class, 'delete']);

Route::get('/login',[Auth\LoginController::class, 'index'])->name('login');
Route::post('/login/proses',[Auth\LoginController::class, 'login']);


Route::get('/register', [Auth\RegisterController::class, 'index']);
Route::post('/register/proses', [Auth\RegisterController::class, 'register']);