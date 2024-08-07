<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiCategoryController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [ApiAuthController::class, 'login']);

Route::middleware('tokenAuth')->group(function () {
    Route::post('logout', [ApiAuthController::class, 'logout']);
    Route::post('category/create', [ApiCategoryController::class, 'create']);
    Route::get('category/get', [ApiCategoryController::class, 'get']);
    Route::post('category/update/{id}', [ApiCategoryController::class, 'update']);
    Route::get('category/delete/{id}', [ApiCategoryController::class, 'delete']);
});
