<?php

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
//** ------------------------------ ----------------------------------   front
Route::get('/', function () {
    return view('front.home.index');
});
Route::resource('job' , 'Pages\JobController');


//-------------------------------------------------------------------------
// auth
Auth::routes();

//----
//--------------------admin
Route::group(/**
 *    CRUD
 */
    ["middleware" => ['auth'], 'prefix' => 'admin'] , function () {
    Route::get('/' , 'HomeController@index')->name('home');
    Route::get('/home' , 'HomeController@index')->name('home');

    //--------------user------------//
    Route::resource('/user' , 'Admin\\UserController');
    //--------------role-----------//
    Route::resource('/role' , 'Admin\\RoleController');
    //--------------job---------------//
    Route::resource('/job' , 'Admin\\JobController');
    //--------------comment----------------//
    Route::resource('comment' , 'Admin\\CommentsController');
});