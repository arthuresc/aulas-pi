<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;

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

Route::get('/semlogin', function (){
    return view('deslogado');
})->middleware(['guest']);


Route::resource('/product', ProductsController::class)->middleware(['auth']);
Route::get('/trash/product', [ProductsController::class, 'trash'])->name('product.trash');
Route::patch('/product/restore/{id}', [ProductsController::class, 'restore'])->name('product.restore');
Route::resource('/category', CategoriesController::class);
Route::resource('/tag', TagsController::class);

// Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
// Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
// Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store'); //rota para armazenar produto no formulario
// Route::get('/product/edit/{product}', [ProductsController::class, 'edit'])->name('product.edit'); //envia o id no http como product para a controller
// Route::post('/product/update/{product}', [ProductsController::class, 'update'])->name('product.update');


require __DIR__.'/auth.php';