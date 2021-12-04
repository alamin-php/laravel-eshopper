<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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


Route::get('/', [HomeController::class, 'index']);


Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Category route here 
    Route::get('dashboard/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('dashboard/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('dashboard/category/add', [CategoryController::class, 'add'])->name('category.add');
    Route::get('dashboard/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
});

