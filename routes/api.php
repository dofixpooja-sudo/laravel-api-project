<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    // Route::get('/categories', [CategoryController::class, 'index']);
    // Route::get('/categories/{id}', [CategoryController::class, 'show']);
    // Route::post('/categories', [CategoryController::class, 'store']);
    // Route::put('/categories/{id}', [CategoryController::class, 'update']);
    // Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

});
