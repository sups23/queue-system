<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/about', function () {
    return view('users.about');
});


Route::get('/dashboard', [UserController::class, 'index'] )->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/availability',[UserController::class, 'availability'] )->middleware(['auth', 'verified'])->name('availability');
Route::post('/appointment',[UserController::class, 'createAppointment'] )->middleware(['auth', 'verified'])->name('app.store');

require __DIR__.'/auth.php';