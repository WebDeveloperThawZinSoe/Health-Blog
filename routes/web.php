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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/******Cleint******/

Route::get('/','PageController@index');
Route::get('/posts/{id}/detail','PageController@detail');

/***** Admin ******/
Route::middleware('auth')->group(function () {
    Route::get('/admin/home','PageController@admin_index');

    Route::get("/admin/accounts/list",'AccountController@show');
    Route::get("/admin/accounts/{id}/delete",'AccountController@delete');
    Route::post("/admin/accounts/create","AccountController@create");

    Route::get("/admin/category","CategoryController@show");
    Route::get("/admin/category/{id}/delete","CategoryController@delete");
    Route::post("/admin/category/create","CategoryController@create");
    Route::get("/admin/category/{id}/update","CategoryController@update");
    Route::post("/admin/category/{id}/update","CategoryController@upgrate");

    Route::get("/admin/post","PostController@show");
    Route::post("/admin/post/create","PostController@create");
    Route::get("/admin/post/{id}/delete","PostController@delete");
    Route::get("/admin/post/{id}/detail","PostController@detail");
    Route::get("/admin/post/{id}/update","PostController@update");
    Route::post("/admin/post/{id}/update","PostController@upgrate");
});