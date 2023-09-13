<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/login', [AdminController::class, 'loginIndex'])->name('admin.login.index');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');


    Route::middleware(['admin'])->group(function () {
        Route::get('/vendors', [AdminController::class, 'vendorsList'])->name('admin.vendors');
        Route::get('/get/vendors', [AdminController::class, 'getVendors'])->name('admin.get.vendors');
        Route::post('/add/vendor', [AdminController::class, 'addVendor'])->name('admin.add.vendor');
        Route::get('/get/single_data', [AdminController::class, 'getSingleData'])->name('admin.get.single_vendor');
        Route::post('/update_vendor', [AdminController::class, 'updateVendor'])->name('admin.update_vendor');
    });
});

Route::middleware(['admin'])->group(function () {
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/get/products', [ProductController::class, 'getProducts'])->name('get.products');
    Route::post('/add/product', [ProductController::class, 'addProduct'])->name('add.product');
    Route::get('/get/single_data', [ProductController::class, 'getSingleData'])->name('get.single_product');
    Route::post('/update_product', [ProductController::class, 'updateProduct'])->name('update.product');
    Route::post('/delete', [ProductController::class, 'deleteProduct'])->name('delete.product');
});

});

Route::middleware(['admin'])->group(function () {
    Route::group(['prefix' => 'stock'], function () {
        Route::get('/', [StockController::class, 'index'])->name('stock.index');
        Route::post('/add/stock', [StockController::class, 'addStock'])->name('add.stock');
        Route::get('/get/stocks', [StockController::class, 'getStocks'])->name('get.stocks');
        Route::get('/get/single_stock', [StockController::class, 'getSingleData'])->name('get.single_stock');
        Route::post('/update_stock', [StockController::class, 'updateStock'])->name('update.stock');
        Route::post('/delete', [StockController::class, 'deleteStock'])->name('delete.stock');
    });
});

