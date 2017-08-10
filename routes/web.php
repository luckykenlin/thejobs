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
Route::group(/**
 *    namespace: namespace
 */
    ['namespace' => 'Pages'] , function () {
        Route::get('/' , 'HomeController@index');
        Route::get('home' , 'HomeController@index');

        //---------- Usermanage action ------------------------------
            //----------------   Job -------------------------------
            Route::get('job-manage' , 'UserManageController@jobManage');  //  Job's management by user
            Route::delete('job-manage/{id}', 'UserManageController@jobDestroy')->name('job.delete');// Job's deletion by user

            //----------------   company ----------------------------
            Route::get('company-manage' , 'UserManageController@companyManage');  //  Job's management by user
            Route::delete('company-manage/{id}', 'UserManageController@companydestroy')->name('company.delete');// Job's deletion by user

        //----------- END ------------------------

        Route::resource('job' , 'JobController');
        Route::resource('company' , 'CompanyController');
        Route::resource('comment' , 'CommentController');
});


//-------------------------------------------------------------------------
// auth
Auth::routes();

//----
//--------------------Admin  Dashboard
Route::group(/**
 *    middleware : Auth
 *    namespace: Admin
 *    prefix: admin
 */
    ["middleware" => ['auth'] , 'prefix' => 'admin' , 'namespace' => 'Admin'] , function () {
    Route::get('/' , 'HomeController@index')->name('home');
    Route::get('/home' , 'HomeController@index')->name('home');

    //--------------user------------//
    Route::resource('/user' , 'UserController');
    //--------------role-----------//
    Route::resource('/role' , 'RoleController');
    //--------------job---------------//
    Route::resource('/job' , 'JobController');
    //--------------category-----------------------//
    Route::resource('category' , 'CategoryController');
    Route::get('category/{id}/delete' , ['as' => 'category.delete' , 'uses' => 'CategoryController@destroy']);
    //--------------comment----------------//
    //    Route::resource('comment' , 'Admin\\CommentsController');
});