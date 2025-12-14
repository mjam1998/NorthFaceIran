<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('login/post',[HomeController::class,'loginPost'])->name('login.post');

Route::prefix('/admin')->middleware('auth')->group(function(){
Route::get('/index',[AdminController::class,'index'])->name('admin.index');

    Route::get('/list',[AdminController::class,'adminList'])->name('admin.list');
    Route::get('/add/view',[AdminController::class,'adminAddView'])->name('admin.add.view');
    Route::post('/add/post',[AdminController::class,'adminAddPost'])->name('admin.add.post');
    Route::get('/edit/view/{id}',[AdminController::class,'adminEdit'])->name('admin.edit,view');
    Route::put('/edit/post',[AdminController::class,'adminEditPost'])->name('admin.edit.post');
    Route::delete('/delete/{id}',[AdminController::class,'adminDelete'])->name('admin.delete');
    Route::post('/restore/{id}',[AdminController::class,'adminRestore'])->name('admin.restore');
    Route::post('/change/sms',[AdminController::class,'adminChangeSms'])->name('admin.change.sms');

    Route::get('/category/list',[CategoryController::class,'categoryList'])->name('admin.category.list');
    Route::post('/category/store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::put('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');

    Route::get('/product',[ProductController::class,'index'])->name('admin.product.index');
    Route::post('/product/store',[ProductController::class,'store'])->name('admin.product.store');
    Route::put('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::get('/product/{product}/colors', [ProductController::class, 'indexColor'])->name('admin.product.colors.index');
    Route::post('/product/color/store', [ProductController::class, 'storeColor'])->name('admin.product.color.store');
    Route::delete('/product/color/{color}', [ProductController::class, 'destroyColor'])->name('admin.product.color.destroy');
    Route::get('/product/{product}/sizes', [ProductController::class, 'indexSize'])->name('admin.product.sizes.index');
    Route::post('/product/size/store', [ProductController::class, 'storeSize'])->name('admin.product.size.store');
    Route::delete('/product/size/{size}', [ProductController::class, 'destroySize'])->name('admin.product.size.destroy');
    Route::get('/product/{product}/photos', [ProductController::class, 'indexPhoto'])->name('admin.product.photos.index');
    Route::post('/product/photo/store', [ProductController::class, 'storePhoto'])->name('admin.product.photo.store');
    Route::delete('/product/photo/{photo}', [ProductController::class, 'destroyPhoto'])->name('admin.product.photo.destroy');
    Route::get('/product/{product}/variants', [ProductController::class, 'indexVariant'])->name('admin.product.variants.index');
    Route::post('/product/variant/store', [ProductController::class, 'storeVariant'])->name('admin.product.variant.store');
    Route::put('/product/variant/{variant}', [ProductController::class, 'updateVariant'])->name('admin.product.variant.update');
    Route::prefix('product/{product}')->group(function () {
        Route::get('/comments', [ProductController::class, 'comments'])->name('admin.product.comments');
        Route::post('/comment/store', [ProductController::class, 'storeComment'])->name('admin.product.comment.store');
        Route::put('/comment/{comment}/response', [ProductController::class, 'updateResponse'])->name('admin.product.comment.response');
        Route::put('/comment/{comment}/status', [ProductController::class, 'updateStatus'])->name('admin.product.comment.status');
        Route::delete('/comment/{comment}', [ProductController::class, 'destroyComment'])->name('admin.product.comment.destroy');
    });

    Route::post('logout',[AdminController::class,'logout'])->name('logout');
});
