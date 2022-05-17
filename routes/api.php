<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MouthfulQueries;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return response()->json(['message' => 'Entrypoint to API Kasironald']);
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login'])->name('api.login');
    Route::post('register', [AuthController::class, 'register'])->name('api.register');
    Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group([ 
    // 'middleware' => 'api'
], function () {
    Route::resource('attendance', AttendanceController::class);
    Route::resource('product', ProductController::class);
    Route::get('user', [AuthController::class, 'index']);
    Route::resource('transaction', TransactionController::class);
    Route::get('keuntungan', [MouthfulQueries::class, 'keuntungan'])->name('keuntungan');
    Route::get('omset', [MouthfulQueries::class, 'omset'])->name('omset');
    Route::get('total_transaction', [MouthfulQueries::class, 'total_transaction'])->name('total_transaction');


});