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

/*Route::group(['prefix'=>'products','middleware' => 'auth'], function(){

    Route::get('/', 'Frontend\PagesController@products');
   Route::post('/store', 'Backend\Marks\MarksController@store')->name('marks.store');
    Route::get('/edit', 'Backend\Marks\MarksController@edit')->name('marks.edit');
    Route::get('/get-student-marks', 'Backend\Marks\MarksController@getMarks')->name('get-student-marks');
    Route::post('/update', 'Backend\Marks\MarksController@update')->name('marks.update');



});*/
