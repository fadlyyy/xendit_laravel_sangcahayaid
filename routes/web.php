<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagihanController;

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

Route::prefix('tagihan')->group(function () {

    /**
     * menampilkan list data tagihan nya
     */
    Route::get('/list', [TagihanController::class, 'index'])->name('tagihan.list');

    /**
     * menuju halaman create form data tagihan nya
     */
    Route::get('/create', [TagihanController::class, 'create'])->name('tagihan.create');

    /**
     * store/save data tagihan nya
     */
    Route::post('/store', [TagihanController::class, 'store'])->name('tagihan.store');

    /**
     * route callback/webhook
     */
    Route::post('/callback', [TagihanController::class, 'callback']);
});
