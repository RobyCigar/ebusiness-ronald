<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
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

// dashboard

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->name('dashboard');

Route::get('auth/login', function () {
    return view('auth/login');
})->name('login');

Route::get('auth/register', function () {
    return view('auth/register');
})->name('register');

// pegawai

Route::resource('pegawai', PegawaiController::class);


Route::get('/pegawai/edit', function (){
    return view ('pegawai/edit');
})->name('pegawai.edit');

// menu

Route::get('/menu', function (){
    return view ('menu/index');
})->name('menu.index');

Route::get('/menu/tambah', function (){
    return view ('menu/tambah');
})->name('menu.tambah');

// pesanan

Route::get('/pesanan', function() {
    return view('pesanan.index');
})->name('pesanan.index');

Route::get('/pesanan/tambah', function() {
    return view('pesanan.tambah');
})->name('pesanan.tambah');

// transaksi

Route::get('/transaksi', function (){
    return view ('transaksi/index');
})->name('transaksi.index');

Route::get('/transaksi/tambah', function (){
    return view ('transaksi/tambah');
})->name('transaksi.tambah');

