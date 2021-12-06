<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
    Route::get('dashboard/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('dashboard/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('dashboard/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('dashboard/category/approval/{id}', [CategoryController::class, 'catApproval'])->name('category.cat_approval');
    // Brand route here 
    Route::get('dashboard/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('dashboard/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('dashboard/brand/add', [BrandController::class, 'add'])->name('brand.add');
    Route::get('dashboard/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('dashboard/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('dashboard/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('dashboard/brand/approval/{id}', [BrandController::class, 'brandApproval'])->name('brand.brand_approval');
    // Product route here 
    Route::get('dashboard/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('dashboard/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('dashboard/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::get('dashboard/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('dashboard/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('dashboard/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('dashboard/product/approval/{id}', [ProductController::class, 'productApproval'])->name('product.product_approval');
});

