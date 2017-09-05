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
use Illuminate\Support\Facades\Route;
//Route::get('test' , 'TestController@index');
Route::group(/**
 *    namespace: namespace
 */
    ['namespace' => 'Pages'] , function () {
    Route::get('/' , 'HomeController@index')->name('front.home');
    Route::get('home' , 'HomeController@index');
    Route::get('contact/about' , function (){   return view('front.contact.about'); });
    Route::get('contact' , function (){   return view('front.contact.contact'); });
    //---------- Usermanage action ------------------------------
    //----------------   Job -------------------------------
    Route::get('job-manage' , 'UserManageController@jobManage');  //  Job's management by user
    Route::delete('job-manage/{id}' , 'UserManageController@jobDestroy')->name('job.delete');// Job's deletion by user
    Route::post('job-mark/{id}' , 'UserManageController@jobMark')->name('job.mark');  //  Mark a job's status
    Route::get('job-candidates/{id}','JobController@jobCandidates');
    Route::post('job-candidates/{job}/{resume}','JobController@resumeStatus');
    Route::get('job-apply/{id}','JobController@jobApply');
    Route::post('job-apply/{id}','JobController@jobApplyWithoutResume');
    Route::post('job-apply/{job}/{id}','JobController@jobResumeApply');
    Route::delete('job-delete/{job}/{resume}' , 'JobController@resumeDestroy');// resumes's deletion by job
    //----------------   company ----------------------------
    Route::get('company-manage' , 'UserManageController@companyManage');
    Route::delete('company-manage/{id}' , 'UserManageController@companyDestroy')->name('company.delete');
    Route::delete('company/{company}/{job}' , 'CompanyController@jobDestroy');// Job's deletion by company
    //----------------   resume ----------------------------
    Route::get('resume-manage' , 'UserManageController@resumeManage');
    Route::delete('resume-manage/{id}' , 'UserManageController@resumeDestroy')->name('resume.delete');
    Route::post('resume-mark/{id}' , 'UserManageController@resumeMark')->name('resume.mark');  //  Mark a resume's status
    //----------------   message ----------------------------
    Route::post('message-resume/{id}','MessageController@resumeMessage');
    Route::post('message-company/{id}','MessageController@companyMessage');
    Route::get('message','MessageController@index');
    Route::delete('message/{id}' , 'MessageController@destroy')->name('message.delete');// Job's deletion by user
    //----------- END ------------------------

    Route::resource('job' , 'JobController');
    Route::resource('company' , 'CompanyController');
    Route::resource('comment' , 'CommentController');
    Route::resource('resume' , 'ResumeController');
    Route::get('/download/{file}', 'ResumeController@getDownload');
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
    //--------------company---------------//
    Route::resource('/company' , 'CompanyController');
    //--------------category-----------------------//
    Route::resource('/category' , 'CategoryController');
    Route::get('category/{id}/delete' , ['as' => 'category.delete' , 'uses' => 'CategoryController@destroy']);
    //--------------comment----------------//
    //    Route::resource('comment' , 'Admin\\CommentsController');
});