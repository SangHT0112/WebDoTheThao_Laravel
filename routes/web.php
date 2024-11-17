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
Route::get('/admin', function () {
    return redirect()->route('admin');
});
Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('admin/users/login',[LoginController::class,'store'])->name('login.store');
Route::get('admin/users/logout',[LoginController::class,'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function(){

        Route::get('main', [MainController::class, 'index'])->name('admin');

        #config
        Route::get('config', [\App\Http\Controllers\Admin\ConfigController::class, 'index'])->name('config');
        Route::post('config', [\App\Http\Controllers\Admin\ConfigController::class, 'update'])->name('configupdate');

        #profile
        Route::get('profile',[\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
        Route::post('profile',[\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profileupdate');


        #menu
        Route::prefix('menus')->group(function(){
            Route::get('add', [MenuController::class,'create'])->name('admin.menus.add');
            Route::post('add', [MenuController::class,'store']); // goi vao store
            Route::get('list', [MenuController::class,'index'])->name('admin.menus.list');
            Route::get('edit/{menu}', [MenuController::class, 'show'])->name('admin.menus.edit');
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::get('destroy/{id}', [MenuController::class,'destroy'])->name('admin.menus.destroy');
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

        #news
        Route::prefix('news')->group(function(){
            Route::get('add',[\App\Http\Controllers\Admin\NewController::class,'create'])->name('admin.news.add');
            Route::get('list',[\App\Http\Controllers\Admin\NewController::class,'list'])->name('admin.news.list');
        });


    });

});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/services/load-product', [HomeController::class, 'loadProduct']);
Route::get('danh-muc/{id}-{slug}.html',[App\Http\Controllers\frontend\MenuController::class,'index'])->name('danhmuc.sanpham');
Route::get('san-pham/{id}-{slug}.html',[App\Http\Controllers\frontend\ProductController::class,'index']);
