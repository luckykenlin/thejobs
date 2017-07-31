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

Route::get('/', function () {
    return view('front.home');
});

//**     front    ---job---*/
//Route::resource('job' , 'Pages\JobController');
//**        ---/job---*/

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