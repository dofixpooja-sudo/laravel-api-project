<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
Route::get('/test', function () {
    return response()->json([
        'status' => true,
        'message' => 'API working successfully'
    ]);
});

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'index']);      // READ (All)
Route::get('/categories/{id}', [CategoryController::class, 'show']);  // READ (Single)
Route::post('/categories', [CategoryController::class, 'store']);     // CREATE
Route::put('/categories/{id}', [CategoryController::class, 'update']); // UPDATE
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // DELETE
