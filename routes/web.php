<?php

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
    return view('products.index',[
        'products' => (new Product())->all()
    ]);
});

Auth::routes();

Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductsController::class, 'edit'])
    ->name('products.edit');

Route::DELETE('/products/{product}/destroy', [\App\Http\Controllers\ProductsController::class, 'destroy'])
    ->name('products.destroy');

Route::PUT('/products/{product}/update', [\App\Http\Controllers\ProductsController::class, 'update'])
    ->name('products.update');




Route::post('/products/store', [\App\Http\Controllers\ProductsController::class, 'store'])
    ->name('products.store');
Route::get('/products/create', [\App\Http\Controllers\ProductsController::class, 'create'])
    ->name('products.create');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [\App\Http\Controllers\ProductsController::class, 'index'])
    ->name('products.index');
Route::get('/products/{product}', [\App\Http\Controllers\ProductsController::class, 'show'])
    ->name('products.show');



//
////
//Route::resource('products', 'ProductsController');


