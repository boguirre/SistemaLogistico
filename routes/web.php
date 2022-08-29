<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\UnitMeasureController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
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
Route::get('get_products_by_id',[ProductController::class, 'get_products_by_id'])->middleware('can:Modulo Productos')->name('get_products_by_id');
Route::get('orders/culminated',[OrderController::class,'culminated'])->middleware('can:Modulo Pedidos')->name('orders.culminated');
Route::get('orders/ontime',[OrderController::class,'ontime'])->middleware('can:Modulo Pedidos')->name('orders.ontime');
Route::get('orders/untimely',[OrderController::class,'untimely'])->middleware('can:Modulo Pedidos')->name('orders.untimely');

Route::post('/orders/{order}/ordercompleted',[OrderController::class, 'ordercompleted'])->middleware('can:Modulo Pedidos')->name('orders.ordercompleted');
Route::post('/orders/{order}/orderincompleted',[OrderController::class, 'orderincompleted'])->middleware('can:Modulo Pedidos')->name('orders.orderincompleted');

Route::resource('categories',CategoryController::class)->middleware('can:Modulo Categorias')->names('categories');
Route::resource('measures',UnitMeasureController::class)->middleware('can:Modulo Unidad de Medida')->names('measures');
Route::resource('products',ProductController::class)->middleware('can:Modulo Productos')->names('products');
Route::resource('supliers',SuplierController::class)->middleware('can:Modulo Proveedores')->names('supliers');
Route::resource('employees',EmployeeController::class)->middleware('can:Modulo Empleados')->names('employees');
Route::resource('purchases',PurchaseController::class)->middleware('can:Modulo compras')->names('purchases');
Route::resource('orders',OrderController::class)->middleware('can:Modulo Pedidos')->names('orders');
Route::resource('roles',RoleController::class)->middleware('can:Modulo Roles')->names('roles');
Route::resource('areas',AreaController::class)->middleware('can:Modulo Areas')->names('areas');
Route::resource('users',UserController::class)->middleware('can:Modulo Usuarios')->names('users');
Route::get('/users/{user}/editarol',[UserController::class, 'editrol'])->middleware('can:Modulo Roles')->name('users.roles');
Route::put('users/{user}/updaterol', [UserController::class, 'updaterol'])->middleware('can:Modulo Roles')->name('users.updaterole');
