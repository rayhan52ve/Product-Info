<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Route::post('/insert',[ProductController::class,'insert']);
Route::get('/',[ProductController::class,'readdata']);
Route::get('/edit_product/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::get('/update_product/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/delete_product/{id}',[ProductController::class,'destroy'])->name('product.destroy');

?>