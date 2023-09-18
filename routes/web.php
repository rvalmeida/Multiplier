<?php

use App\Http\Controllers\Controller;
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

Route::get('/', function () {return view('welcome');});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
    Route::controller(Controller::class)->group(function () {
        Route::get('/dashboard', 'read')->name('dashboard');
        Route::get('/cadastro', 'create')->name('cadastro');
		Route::get('/cadastro/{id}', 'edit')->name('edit');
    });
});
