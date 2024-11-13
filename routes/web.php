<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Services\UploadService;

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

Route::get('admin/users/login',[LoginController::class,'index'])->name('login');

Route::post('admin/users/login/store',[LoginController::class,'store']);



Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function(){
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #menu
        Route::prefix('menus')->group(function(){
            Route::get('add', [MenuController::class,'create'])->name('admin.menus.add');
            Route::post('add', [MenuController::class,'store']); // goi vao store
            Route::get('list', [MenuController::class,'index'])->name('admin.menus.list');
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class,'destroy']);
        });

        #category



        #products
        Route::prefix('products')->group(function(){
            Route::get('add', [ProductController::class,'create'])->name('admin.products.add');
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index'])->name('admin.products.list');
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #upload
        Route::post('upload/services',[UploadController::class,'store']);

        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create'])->name('admin.sliders.add');;
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index'])->name('admin.sliders.list');;
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });


    });

});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/services/load-product', [HomeController::class, 'loadProduct']);
Route::get('danh-muc/{id}-{slug}.html',[App\Http\Controllers\frontend\MenuController::class,'index']);
