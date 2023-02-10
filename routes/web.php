<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TripayCallbackController;
use App\Http\Controllers\IakCallbackController;
use App\Http\Controllers\DuitkuCallbackController;

use App\Http\Controllers\DuitkuController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LayananDigitalController;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[WelcomeController::class,'index']);

Route::get('/stock',[ProductController::class,'stock']);
Route::get('/detail/product/{id}',[WelcomeController::class,'detail']);



route::post ('/loginn', [AuthController::class,'login']);

Route::post('login', [AuthController::class,'login'])->name('login');
Route::post('/register', [AuthController::class,'register'])->name('register');

Route::get('/logout', [AuthController::class,'logout']);

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/cart',[CartController::class,'index']);
    Route::get('admin/transaction',[TransactionController::class,'show_all']);

    Route::get('/admin/product',[ProductController::class,'index']);
    Route::get('/admin/product/delete/{id}', [ProductController::class,'destroyproduct']);

    Route::get('/admin/product/create/', [ProductController::class,'create']);
    Route::post('/admin/product/store/', [ProductController::class,'store']);

    Route::get('/admin/product/edit/{id}', [ProductController::class,'edit']);
    Route::post('/admin/product/update', [ProductController::class,'update']);


});

Route::group(['middleware' => ['role:staff,admin']], function () {

    Route::get('/cart',[CartController::class,'index']);
    Route::get('admin/transaction',[TransactionController::class,'show_all']);

    Route::get('/admin/product',[ProductController::class,'index']);
    Route::get('/admin/product/delete/{id}', [ProductController::class,'destroyproduct']);
    Route::post('/admin/product/create/', [ProductController::class,'create']);
    Route::post('/admin/product/edit', [ProductController::class,'edit']);



});

Route::group(['middleware' => ['role:user,staff,admin']], function () {

    Route::get('/cart',[CartController::class,'index']);
    Route::get('/cart/delete/{id}',[CartController::class,'delete']);
    Route::get('/cart/plus/{id}',[CartController::class,'plus']);
    Route::get('/cart/minus/{id}',[CartController::class,'minus']);
    Route::get('/cart/{id}/create',[CartController::class,'create']);

    Route::get('/checkout',[CheckoutController::class,'index']);

    Route::post('/transaction/store/',[TransactionController::class,'store']);
    Route::get('/transaction',[TransactionController::class,'show']);
    Route::get('/transaction/{references}',[TransactionController::class,'detail']);


    route::get('/kalkulator/{amount}', [DuitkuController::class,'KalkulatorBiaya']);




});

route::post('/callback/duitku', [DuitkuCallbackController::class,'handle']);

route::post('/callback/iak', [IakCallbackController::class,'handle']);

// route::post('/callback', [DuitkuCallbackController::class,'handle']);
route::post('/callback', [TripayCallbackController::class,'handle']);


// Route::get('/operator/{category_id}', [LayananDigitalController::class,'operator']);

// Route::get('/product/{operator_id}/{category_id}', [LayananDigitalController::class,'product']);

// route::get('/pricelist/pulsa', [LayananDigitalController::class,'pricelist_pulsa']);
// route::get('/pricelist/dana', [LayananDigitalController::class,'pricelist_dana']);
// route::get('/pricelist/ovo', [LayananDigitalController::class,'pricelist_ovo']);
// route::get('/pricelist/gopay', [LayananDigitalController::class,'pricelist_gojek']);

// route::get('/topup', [TopupController::class,'index']);

// route::get('/beli/{kategori}', [LayananDigitalController::class,'iak_kategori']);

// route::get('/filter/pulsa/{code}', [LayananDigitalController::class,'filter_pulsa']);

// route::get('/prefix/pulsa/{operator}', [LayananDigitalController::class,'prefix_pulsa']);

// route::post('/transaction/pulsa', [TransactionController::class,'transaction_pulsa']);
