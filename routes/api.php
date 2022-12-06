<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
//sms routes
    Route::get('/messages', [ApiController::class, 'getMessages']);
    Route::get('/messages/outstanding', [ApiController::class, 'outstanding']);
    Route::post('/messages/receive', [ApiController::class, 'received']);
    Route::post('/messages/send', [ApiController::class, 'sendMessage']);
    Route::any('/messages/{any?}/events', [ApiController::class, 'events']);
    Route::any('/phones', [ApiController::class, 'phones']);
    Route::put('/phones', [ApiController::class, 'updatePhones']);
    Route::get('/heartbeats', [ApiController::class, 'heartbeats']);
    Route::post('/heartbeats', [ApiController::class, 'heartbeats']);
    Route::post('/send_sms', [ApiController::class, 'send_sms']);
    Route::any('/billing/usage', [ApiController::class, 'billing']);
    Route::any('/billing/usage-history', [ApiController::class, 'billingHistory']);
    Route::put('/users/me', [ApiController::class, 'updateUser']);
    Route::get('/users/me', [ApiController::class, 'me']);


Route::prefix('v1')->group(function () {
    Route::any('/messages', [ApiController::class, 'getMessages']);
    Route::any('/messages/outstanding', [ApiController::class, 'outstanding']);
    Route::any('/messages/receive', [ApiController::class, 'received']);
    Route::any('/messages/send', [ApiController::class, 'sendMessage']);
    Route::any('/messages/{any?}/events', [ApiController::class, 'send']);
    Route::post('/phones', [ApiController::class, 'send']);
    Route::get('/phones/{param4?}', [ApiController::class, 'updatePhones']);
    Route::any('/billing/usage', [ApiController::class, 'billing']);
    Route::any('/billing/usage-history', [ApiController::class, 'billingHistory']);
    Route::any('/users/me', [ApiController::class, 'me']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
