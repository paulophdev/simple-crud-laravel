<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

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

Route::get('/welcome', function(){
    return 'Olá Mundo';
});
Route::get('/', [UserController::class, 'index']);
Route::get('user-create', function () {
    return view('userStore');
})->name('user.create');
Route::get('user-update/{user}', [UserController::class, 'show'])->name('user.update.show');
Route::post('user', [UserController::class, 'store'])->name('user.store');
Route::post('userUp', [UserController::class, 'update'])->name('user.update');
Route::get('userDel/{user}', [UserController::class, 'destroy'])->name('user.destroy');