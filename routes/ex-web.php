<?php

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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlertController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');

Route::get('/alerts', [AlertController::class, 'index'])->name('alerts.index');
Route::get('/alerts/create/{coin}', [AlertController::class, 'create'])->name('alerts.create');

Route::post('/alerts', [AlertController::class, 'store'])->name('alerts.store');

Route::delete('/alerts/{alert}', [AlertController::class, 'delete'])->name('alerts.delete');


// routes update
Route::get('/alerts/{alert}/edit', [AlertController::class, 'edit'])->name('alerts.edit');
Route::put('/alerts/{alert}', [AlertController::class, 'update'])->name('alerts.update');