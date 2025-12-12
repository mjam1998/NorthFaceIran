<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

    Route::post('logout',[AdminController::class,'logout'])->name('logout');
});
