<?php

use Illuminate\Support\Facades\Route;

// User Routes
Route::group(['namespace' => 'user'],function(){
    Route::get('/','HomeController@index');
    Route::get('post/{post}','PostController@post')->name('post');
    Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
    Route::get('post/category/{category}','HomeController@category')->name('category');
    Route::get('post/categories/{categoryhome}','HomeController@categoryhome')->name('categoryhome');
    Route::get('search', 'HomeController@search')->name('find');
});

// Admin Routes
Route::group(['namespace' => 'Admin'],function(){
    // User Controllers
    Route::resource('/admin/users','UserController');
    // Home Controllers
    // Route::get('/admin/home/main','HomeController@index');
    //Post Routes
    Route::resource('admin/post','PostController');
    // Restricted Route
    Route::get('admin/post/create','PostController@create')
    ->name('post.create')
    ->middleware('role:creator;super');

    // Tag Routes
    Route::resource('admin/tag','TagController');
    // Category Routes
    Route::resource('admin/category','CategoryController');
    // Admin Login Routes
    // Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
    // Route::post('admin-login','Auth\LoginController@login');


});

//CkEditor Routes
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
