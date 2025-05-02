<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vendors', 'App\Http\Controllers\VendorController', ['names'=>'vendors']);
Route::resource('products', 'App\Http\Controllers\ProductController', ['names'=>'products']);
Route::resource('outlets', 'App\Http\Controllers\OutletController', ['names'=>'outlets']);
Route::resource('warehouses', 'App\Http\Controllers\WarehouseController', ['names'=>'warehouses']);
Route::resource('purchase_orders', 'App\Http\Controllers\PurchaseOrderController', ['names'=>'purchase_orders']);
