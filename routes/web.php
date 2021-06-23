<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
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
    return view('welcome');
});

Route::get('/delete/{id}', [SiswaController::class,'destroy']);
Route::post('/addsiswa', [SiswaController::class, 'create']);
Route::post('/editsiswa', [SiswaController::class, 'update']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();
