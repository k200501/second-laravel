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

Route::get('/', function () {
    return view('welcome');
});

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

Route::middleware(['auth','can:admin'])->prefix('admin')->group(function(){
    Route::get('/news', 'Newscontroller@index');
    Route::get('/product/type', 'Productcontroller@product');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user','UserController@index');
    Route::get('/user/create','UserController@create');
    Route::post('/user/store','UserController@store');
    Route::get('/user/edit/{id}','UserController@edit');
    Route::post('user/update/{id}','UserController@update');
    Route::delete('/user/delete/{id}','UserController@detete');
    Route::get('/product/type/create','Productcontroller@create');
    Route::post('/product/store','Productcontroller@store');


});


// Route::get('/admin/news', 'Newscontroller@index');
// Route::get('/admin/product', 'Productcontroller@product');
