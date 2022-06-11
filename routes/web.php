<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;

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

Route::get('/', [ServerController::class, 'unlogged'])->name('welcome');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/home', [ServerController::class, 'index'])->name('home');

    Route::get('/add', [ServerController::class, 'add'])->name('add');
    Route::post('/add', [ServerController::class, 'store']);

    Route::get('/edit/{id}', [ServerController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [ServerController::class, 'update']);

    Route::get('/delete/{id}', [ServerController::class, 'delete'])->name(
        'delete'
    );
    // Route::get('/servers', [ServerController::class, 'index'])->name('servers');
});
