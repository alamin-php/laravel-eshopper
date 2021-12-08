<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
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

// Frontend route 
Route::get('/', [HomeController::class, 'index']);
Route::get('/product/category/{id}', [HomeController::class, 'productByCategory'])->name('product.byCategory');
Route::get('/product/brand/{id}', [HomeController::class, 'productByBrand'])->name('product.byBrand');

// Backend route
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
    // Slider route here 
    Route::get('dashboard/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('dashboard/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('dashboard/slider/add', [SliderController::class, 'add'])->name('slider.add');
    Route::get('dashboard/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('dashboard/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('dashboard/slider/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('dashboard/slider/approval/{id}', [SliderController::class, 'sliderApproval'])->name('slider.slider_approval');
});

