<?php

use App\Http\Controllers\admin\auth_controller;
use App\Http\Controllers\admin\category_controller;
use App\Http\Controllers\admin\dashboard_controller;
use App\Http\Controllers\admin\movie_controller;
use App\Http\Controllers\admin\script_controller;
use App\Http\Controllers\admin\slider_controller;
use App\Http\Controllers\admin\user_controller;
use Illuminate\Support\Facades\Route;
Route::controller(auth_controller::class)->group(function(){
    Route::get('/admin/login','page_login')->name('admin.auth.page.login');
    Route::get('/admin/register','page_register')->name('admin.auth.page.register');
    Route::post('/admin/login','login')->name('admin.auth.login');
    Route::post('/admin/register','register')->name('admin.auth.register');
});
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::controller(script_controller::class)->group(function(){
        Route::get('/script/district','district')->name('admin.script.district');
        Route::get('/script/commune','commune')->name('admin.script.commune');
        Route::get('/script/village','village')->name('admin.script.village');
        Route::get('/script/category','category')->name('admin.script.category');
        Route::get('/script/users','users')->name('admin.script.users');
        Route::get('/script/slider','slider')->name('admin.script.slider');
        Route::get('/script/movie','movie')->name('admin.script.movie');
    });
    Route::controller(dashboard_controller::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('admin.dashboard');
    });
    Route::controller(user_controller::class)->group(function(){
        Route::get('/users','index')->name('admin.user.index');
        Route::get('/user/create','create')->name('admin.user.create');
        Route::post('/user/store','store')->name('admin.user.store');
        Route::post('/user/delete','delete')->name('admin.user.delete');
        Route::post('/user/update','update')->name('admin.user.update');
    });
    Route::controller(slider_controller::class)->group(function(){
        Route::get('/slider','index')->name('admins.slider.index');
        Route::get('/slider/create','create')->name('admins.slider.create');
        Route::post('/slider/store','store')->name('admin.slider.store');
        Route::post('/slider/update','update')->name('admin.slider.update');
        Route::post('/slider/delete','delete')->name('admin.slider.delete');
    });
    Route::controller(category_controller::class)->group(function(){
        Route::get('/category','index')->name('admin.category.index');
        Route::get('/category/create','create')->name('admin.category.create');
        Route::post('/category/store','store')->name('admin.category.store');
        Route::post('/category/delete','delete')->name('admin.category.delete');
        Route::post('/category/update','update')->name('admin.category.update');
    });
    Route::controller(movie_controller::class)->group(function(){
        Route::get('/mivie','index')->name('admin.movie.index');
        Route::get('/movie/create','create')->name('admin.movie.create');
        Route::post('/movie/store','store')->name('admin.movie.store');
        Route::post('/movie/delete','delete')->name('admin.movie.delete');
        Route::post('/movie','update')->name('admin.movie.update');
    });
});
