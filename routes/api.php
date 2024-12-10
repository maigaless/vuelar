<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\api\CatergoryController;
use App\Http\Controllers\api\TarifController;
use App\Http\Controllers\api\DepotStockController;
use App\Http\Controllers\api\NumberPatternController;
use App\Http\Controllers\api\PaymentMethodController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\ShippmentMethodController;
use App\Http\Controllers\api\TaxController;


// ------ Route to Register------------
Route::post('/register', [RegisterController::class, 'register']);

//---------Route to login ------------
Route::post('/login', [AuthenController::class, 'login']);

//----------Route Login by pincode ----------------
Route::post('/loginpincode', [AuthenController::class, 'loginByPincode']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//--------------------------------Categrory Controller --------------------------------

Route::controller(CatergoryController::class)->group(function(){
        Route::get('/categories','getAllCategories')->name("categories");
        Route::post('/categories/store', 'storeCategory');
});

//---------------------------Tarif Controller --------------------------------
Route::controller(TarifController::class)->group(function(){
    Route::get('/tarifs','getAllTarifs')->name("tarifs");
    Route::post('/tarifs/store', 'storeTarif');
});

//----------------------Depot Stock Controller --------------------------------------

Route::controller(DepotStockController::class)->group(function(){
    Route::get('/depotstocks','getAllDepotsStock')->name("Depots");
    Route::post('/depotstocks/store', 'storeDepot');
});

//-----------------------------Payment methods ----------------
Route::controller(PaymentMethodController::class)->group(function(){
    Route::get('/paymentsWays','getAllPaymentsWays')->name("PaymentsWays");
    Route::post('/paymentsWays/store', 'storePaymentMethod');
});

//---------------------Shippement Controller---------------------------------------

Route::controller(ShippmentMethodController::class)->group(function(){
    Route::get('/shippmentsWays','getAllShippingsWays')->name("ShippmentsWays");
    Route::post('/shippmentsWays/store', 'storeShippmentMethod')->name("Shippment_store");
});


// -------------------TAX Controller -----------------------------------------
Route::controller(TaxController::class)->group(function(){
    Route::get('/taxes','getAllTaxes')->name("taxes");
    Route::post('/taxes/store', 'storeTax')->name("tax_store");
});


//----------------------------Product controller ----------------------------------

Route::controller(ProductController::class)->group(function(){
    Route::get('/products','getAllProducts')->name("products");
    Route::get('/products/next', 'getNextProductNumber')->name("Next_ProductNumber");
    Route::post('/products/rollback','rollbackNumber')->name("Rollback_ProductNumber");
    Route::post('/products/store', 'StoreProduct')->name("proucts_store");
});


Route::controller(NumberPatternController::class)->group(function(){
    Route::get('/numerotations','AllPatterns')->name('numerotations');
    Route::post('/numerotations/store', 'storePattern')->name('store_pattern');
});