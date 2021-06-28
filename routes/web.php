<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/contact_us',function(){
//     return view('front.contact_us.index');
// });
// Route::get('contact_us','FrontController@contactus');

Auth::routes();



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('contact_us')-> group(function () {
    Route::get('/', 'FrontController@contactus');
    Route::post('/store', 'ContackUsController@store');



});
Route::get('/product','FrontController@product');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::prefix('contact_us')->group(function () {
        Route::get('/', 'ContackUsController@index');
        Route::get('/edit/{id}', 'ContackUsController@edit');
        Route::delete('/delete/{id}', 'ContackUsController@delete');


    });

    Route::prefix('/product')->group(function () {
        // 產品管理
        Route::prefix('/type')->group(function () {
            // 產品種類管理
            Route::get('/', 'ProductTypeController@index');
            Route::get('/create', 'ProductTypeController@create');
            Route::post('/store', 'ProductTypeController@store');
            Route::get('/edit/{id}', 'ProductTypeController@edit');
            Route::post('/update/{id}', 'ProductTypeController@update');
            Route::delete('/delete/{id}', 'ProductTypeController@delete');
        });

        Route::prefix('/item')->group(function () {
            // 產品品項管理
            Route::get('/', 'ProductController@index');
            Route::get('/create', 'ProductController@create');
            Route::post('/store', 'ProductController@store');
            Route::get('/edit/{id}', 'ProductController@edit');
            Route::post('/update/{id}', 'Productcontroller@update');
            Route::delete('/delete/{id}', 'Productcontroller@delete');
            Route::post('/deleteImage', 'ProductController@deleteImage');
        });
    });
    Route::get('/', 'FrontController@index');
    Route::prefix('/shopping_cart')->group(function () {
        Route::get('step01','FrontController@step01');
        Route::get('step02','FrontController@step02');
        Route::get('step03','FrontController@step03');
        Route::get('step04','FrontController@step04');
        Route::post('add','FrontController@add');
        Route::get('content','FrontController@content');

    });





    Route::get('/news', 'Newscontroller@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user', 'UserController@index');
    Route::get('/user/create', 'UserController@create');
    Route::post('/user/store', 'UserController@store');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::post('user/update/{id}', 'UserController@update');
    Route::delete('/user/delete/{id}', 'UserController@detete');

});
// Route::get('/admin/news', 'Newscontroller@index');
//     Route::get('/admin/product/type', 'Productcontroller@product');
//     Route::get('/admin/home', 'HomeController@index')->name('home');
//     Route::get('/admin/user','UserController@index');
//     Route::get('/admin/user/create','UserController@create');
//     Route::post('/admin/user/store','UserController@store');
//     Route::get('/admin/user/edit/{id}','UserController@edit');
//     Route::post('/admin/user/update/{id}','UserController@update');
//     Route::delete('/admin/user/delete/{id}','UserController@detete');
//     Route::get('/admin/product/type/create','Productcontroller@create');
//     Route::post('/admin/product/store','Productcontroller@store');
// Route::get('/admin/user','UserController@index');

// Route::get('/admin/news', 'Newscontroller@index');
// Route::get('/admin/product', 'Productcontroller@product');
