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
    Route::get('/get-product', [ProductWarehouseAssetController::class, 'readProduct']);
    Route::post('/add-warehouse', [ProductWarehouseAssetController::class, 'addWarehouse']);
    Route::get('/get-warehouse', [ProductWarehouseAssetController::class, 'readWarehouse']);
    Route::post('/add-product-location', [ProductWarehouseAssetController::class, 'storeProductLocation']);
    Route::get('/get-product-location', [ProductWarehouseAssetController::class, 'readProductLocation']);
    Route::post('/add-asset', [ProductWarehouseAssetController::class, 'storeAsset']);
    Route::get('/get-asset', [ProductWarehouseAssetController::class, 'readAsset']);

    //CUSTOMER and BUSINESS CATEGORY
    Route::post('/add-customer', [CustomerBusinessCategoryController::class, 'storeCustomer']);
    Route::get('/get-customer', [CustomerBusinessCategoryController::class, 'readCustomer']);
    Route::post('/add-business-category', [CustomerBusinessCategoryController::class, 'storeBusinessCategory']);
    Route::get('/get-business-category', [CustomerBusinessCategoryController::class, 'readBusinessCategory']);

    //ORDER and REPORT
    Route::post('/add-consumption-report', [OrderReportController::class, 'storeConsumptionReport']);
    Route::get('/get-consumption-report', [OrderReportController::class, 'readConsumptionReport']);
    Route::post('/customer-order', [OrderReportController::class, 'storeAutoOrder']);
    Route::post('/get-customer-order', [OrderReportController::class, 'readAutoOrder']);
    Route::post('/marketing-order', [OrderReportController::class, 'addMarketingOrder']);
    Route::post('/get-marketing-order', [OrderReportController::class, 'readMarketingOrder']);
});
