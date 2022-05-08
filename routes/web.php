<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

// Auth::routes();

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/users', UserController::class);
});


Route::get('auth/login', function () {
    return view('auth/login');
})->name('login');

Route::get('auth/register', function () {
    return view('auth/register');
})->name('register');

Route::get('/menu/aturmenu', function (){
    return view ('menu/tambah');
})->name('aturmenu');

Route::get('/dashboard/editpegawai', function (){
    return view ('dashboard/editpegawai');
})->name('editpegawai');

Route::get('/transaksi/tambahtransaksi', function (){
    return view ('/transaksi/tambahtrans');
})->name('tambahtransaksi');

Route::get('/menu/daftarmenu', function (){
    return view ('menu/index');
})->name('daftarmenu');
