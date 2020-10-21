<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});*/


/*Route::get('/', function () {
    return view('index');
});*/



/*Route::get('/products', 'Frontend\PagesController@products');*/

Route::get('/',[App\Http\Controllers\Frontend\PagesController::class,'index'])->name('index');
Route::get('/products',[App\Http\Controllers\Frontend\PagesController::class,'products'])->name('products');



/*Route::get('/', [\App\Http\Controllers\PagesController::class,'index'])->name('index');*/

Route::group(['prefix'=>'admin'], function(){


   Route::get('/', [App\Http\Controllers\Backend\AdminController::class,'index'])->name('admin.index');


});



Route::prefix('product')->group(function(){

    Route::get('/view', [App\Http\Controllers\Backend\ProductController::class,'view'])->name('product.view');
    Route::get('/add', [App\Http\Controllers\Backend\ProductController::class,'add'])->name('product.add');
    Route::post('/store', [App\Http\Controllers\Backend\ProductController::class,'store'])->name('product.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\ProductController::class,'edit'])->name('product.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\ProductController::class,'update'])->name('product.update');
    Route::post('/delete/{id}', [App\Http\Controllers\Backend\ProductController::class,'delete'])->name('product.delete');



});
