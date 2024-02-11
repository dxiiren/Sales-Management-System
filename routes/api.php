<?php

use App\Http\Controllers\CountDailySalesController;
use App\Http\Controllers\StoreSaleController;
use App\Models\Sale;
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

//create sale manual
Route::post('/sales', StoreSaleController::class);

//count daily sale based on date range
Route::post('/daily-sale', CountDailySalesController::class);

//create sale using factory
Route::get('/store-sale', function () {
    return response()->json([
        'message' => 'Sale created successfully',
        'sale' => Sale::factory()->create()
    ]);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
