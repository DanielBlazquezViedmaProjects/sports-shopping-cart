<?php

use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test-session', function () {
    session(['user_id' => 1, 'username' => 'john.doe']);
    return "Sesión de prueba guardada.";
});

Route::post('/cart', [CartController::class, 'addToCart']);
Route::prefix('cart')->group(function () {
    Route::post('/add', [CartController::class, 'addToCart']);
    Route::put('/update/{productId}', [CartController::class, 'updateCart']);
    Route::delete('/remove/{productId}', [CartController::class, 'removeFromCart']);
    Route::get('/total', [CartController::class, 'getTotalProducts']);
    Route::post('/confirm', [CartController::class, 'confirmPurchase']);
});
