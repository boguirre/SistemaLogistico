<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\UnitMeasureController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('get_products_by_id',[ProductController::class, 'get_products_by_id'])->name('get_products_by_id');

Route::resource('categories',CategoryController::class)->names('categories');
Route::resource('measures',UnitMeasureController::class)->names('measures');
Route::resource('products',ProductController::class)->names('products');
Route::resource('supliers',SuplierController::class)->names('supliers');
Route::resource('employees',EmployeeController::class)->names('employees');
Route::resource('purchases',PurchaseController::class)->names('purchases');
Route::resource('orders',OrderController::class)->names('orders');
Route::resource('roles',RoleController::class)->names('roles');
