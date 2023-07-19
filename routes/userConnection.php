<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserConnectionController;

Route::middleware('auth')->group(function () {
    Route::get('/suggestions', [UserConnectionController::class, 'getSuggestions']);
    Route::post('/connect', [UserConnectionController::class, 'sendRequest']);
    Route::delete('/connect/{id}', [UserConnectionController::class, 'withdrawRequest']);
    Route::get('/sent-requests', [UserConnectionController::class, 'sentRequests']);
    Route::get('/received-requests', [UserConnectionController::class, 'receivedRequests']);
    Route::post('/accept-request/{id}', [UserConnectionController::class, 'acceptRequest']);
    Route::get('/connections', [UserConnectionController::class, 'getConnections']);
    Route::delete('/connection/{id}', [UserConnectionController::class, 'removeConnection']);
    Route::get('/connections-in-common/{id}', [UserConnectionController::class, 'getConnectionsInCommon']);
});


