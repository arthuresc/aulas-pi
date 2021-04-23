<?php

use App\Http\Controllers\ProductsController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Route::resource('/product', ProductsController::class);
// Route::resource('/category', CategorysController::class);
// Route::resource('/tag', TagsController::class);

Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store'); //rota para armazenar produto no formulario
Route::get('/product/edit/{product}', [ProductsController::class, 'edit'])->name('product.edit'); //envia o id no http como product para a controller
Route::post('/product/update/{product}', [ProductsController::class, 'update'])->name('product.update');


require __DIR__.'/auth.php';