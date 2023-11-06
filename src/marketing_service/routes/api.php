<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\ProductWarehouseAssetController;
use App\Http\Controllers\CustomerBusinessCategoryController;
use App\Http\Controllers\OrderReportController;

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


//kurang method" GET
Route::group(['prefix' => 'marketing'], function ($router) {
    //TEST ROUTE localhost/api/marketing/[endpoint]
    Route::get('/test', [MarketingController::class, 'index']);

    //PRODUK, WAREHOUSE, and ASSETs
    Route::post('/add-product', [ProductWarehouseAssetController::class, 'addProduct']);
    Route::post('/add-warehouse', [ProductWarehouseAssetController::class, 'addWarehouse']);
    Route::post('/add-product-location', [ProductWarehouseAssetController::class, 'p']);
    Route::post('/add-asset', [ProductWarehouseAssetController::class, 'p']);
    

    //CUSTOMER and BUSINESS CATEGORY
    Route::post('/add-customer', [CustomerBusinessCategoryController::class, 'storeCustomer']);
    Route::get('/get-customer', [CustomerBusinessCategoryController::class, 'readCustomer']);
    Route::post('/add-business-category', [CustomerBusinessCategoryController::class, 'storeBusinessCategory']);

    //ORDER and REPORT
    Route::post('/add-consumption-report', [OrderReportController::class, 'storeConsumptionReport']);
    Route::post('/auto-order-customer', [OrderReportController::class, 'storeAutoOrder']);
    Route::post('/customer-order', [OrderReportController::class, 'p']);
    Route::post('/marketing-order', [OrderReportController::class, 'p']);
    
});
