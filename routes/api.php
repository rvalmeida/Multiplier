<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\ClientesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    
    $token = json_encode(['token'=> $user->createToken($request->device_name)->plainTextToken]);

    return $token;
});

Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::controller(ClientesController::class)->group(function () {
        Route::get('/cliente', 'read')->name('api.cliente.read');
        Route::post('/cliente', 'store')->name('api.cliente.store');
        Route::get('/cliente/{id}', 'show')->name('api.cliente.show');
        Route::post('/cliente/{id}', 'update')->name('api.cliente.update');
        Route::delete('/cliente/{id}', 'destroy')->name('api.cliente.destroy');
    });

});
