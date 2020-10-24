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


Route::get('/search',[App\Http\Controllers\Frontend\PagesController::class,'search'])->name('search');


Route::prefix('products')->group(function(){

    Route::get('product/{slug}',[App\Http\Controllers\Frontend\ProductController::class,'show'])->name('products.show');

    Route::get('/',[App\Http\Controllers\Frontend\PagesController::class,'products'])->name('products');

    Route::get('/categories',[App\Http\Controllers\Frontend\CategoriesController::class,'index'])->name('categories.index');
    Route::get('/category/{id}',[App\Http\Controllers\Frontend\CategoriesController::class,'show'])->name('categories.show');
});





/*Route::get('/', [\App\Http\Controllers\PagesController::class,'index'])->name('index');*/

Route::group(['prefix'=>'admin'], function(){


   Route::get('/', [App\Http\Controllers\Backend\AdminController::class,'index'])->name('admin.index');


});



Route::prefix('product')->group(function(){

   /* Route::get('/view', [App\Http\Controllers\Backend\ProductController::class,'view'])->name('product.view');
    Route::get('/add', [App\Http\Controllers\Backend\ProductController::class,'add'])->name('product.add');
    Route::post('/store', [App\Http\Controllers\Backend\ProductController::class,'store'])->name('product.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\ProductController::class,'edit'])->name('product.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\ProductController::class,'update'])->name('product.update');
    Route::post('/delete/{id}', [App\Http\Controllers\Backend\ProductController::class,'delete'])->name('product.delete');*/

    Route::get('/index', [App\Http\Controllers\Backend\ProductController::class,'index'])->name('product.index');
    Route::get('/create', [App\Http\Controllers\Backend\ProductController::class,'create'])->name('product.create');
    Route::post('/store', [App\Http\Controllers\Backend\ProductController::class,'store'])->name('product.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\ProductController::class,'edit'])->name('product.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\ProductController::class,'update'])->name('product.update');
    Route::post('/delete/{id}', [App\Http\Controllers\Backend\ProductController::class,'delete'])->name('product.delete');


});

Route::prefix('category')->group(function(){

    /*Route::get('/view', [App\Http\Controllers\Backend\CategoryController::class,'view'])->name('category.view');
    Route::get('/add', [App\Http\Controllers\Backend\CategoryController::class,'add'])->name('category.add');
    Route::post('/store', [App\Http\Controllers\Backend\CategoryController::class,'store'])->name('category.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\CategoryController::class,'update'])->name('category.update');
    Route::post('/delete/{id}', [App\Http\Controllers\Backend\CategoryController::class,'delete'])->name('category.delete');*/


    Route::get('/index', [App\Http\Controllers\Backend\CategoryController::class,'index'])->name('category.index');
    Route::post('/store', [App\Http\Controllers\Backend\CategoryController::class,'store'])->name('category.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\CategoryController::class,'edit'])->name('category.edit');
    Route::get('/create', [App\Http\Controllers\Backend\CategoryController::class,'create'])->name('category.create');
    Route::post('/delete/{id}', [App\Http\Controllers\Backend\CategoryController::class,'category_delete'])->name('category.delete');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\CategoryController::class,'update'])->name('category.update');


});

Route::prefix('brand')->group(function(){


    Route::get('/index', [App\Http\Controllers\Backend\BrandController::class,'index'])->name('brand.index');
    Route::post('/store', [App\Http\Controllers\Backend\BrandController::class,'store'])->name('brand.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Backend\BrandController::class,'edit'])->name('brand.edit');
    Route::get('/create', [App\Http\Controllers\Backend\BrandController::class,'create'])->name('brand.create');
    Route::post('/delete/{id}', [App\Http\Controllers\Backend\BrandController::class,'brand_delete'])->name('brand.delete');
    Route::post('/update/{id}', [App\Http\Controllers\Backend\BrandController::class,'update'])->name('brand.update');


});
