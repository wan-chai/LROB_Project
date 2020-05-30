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
    return view('auth.login');
});


	


Auth::routes();

// Project
Route::get('/home', 'ProjectController@index')->name('home');
Route::get('/project', 'ProjectController@index')->name('project');
Route::get('/addProject', 'ProjectController@addProject')->name('addProject');
Route::get('/addSupervisor', 'ProjectController@addSV')->name('addSV');
Route::post('/saveNewProject', 'ProjectController@saveNewProject')->name('saveNewProject');
Route::post('/saveUpdateProject', 'ProjectController@saveUpdateProject')->name('saveUpdateProject');
Route::get('/viewProject/{id}', 'ProjectController@viewProject')->name('viewProject');
Route::get('/editProject/{id}', 'ProjectController@editProject')->name('editProject');
Route::get('/deleteProject/{id}', 'ProjectController@deleteProject')->name('deleteProject');
Route::get('/login/logout', 'ProjectController@logout')->name('logout');
Route::post('/searchProject', 'ProjectController@searchProject')->name('searchProject');

// Admin
Route::get('/user', 'UserController@index')->name('user');
Route::get('/addUser', 'UserController@addUser')->name('addUser');
Route::get('/editUser/{id}', 'UserController@editUser')->name('editUser');
Route::get('/viewUser/{id}', 'UserController@viewUser')->name('viewUser');
Route::get('/deleteUser/{id}', 'UserController@deleteUser')->name('deleteUser');
Route::post('/saveNewUser', 'UserController@saveNewUser')->name('saveNewUser');
Route::post('/saveUpdateUser', 'UserController@saveUpdateUser')->name('saveUpdateUser');
Route::post('/searchUser', 'UserController@searchUser')->name('searchUser');

// Grading
Route::get('/grading', 'GradingController@index')->name('grading');
Route::get('/editGrading/{id}', 'GradingController@editGrading')->name('editGrading');
// Route::get('/viewGrading/{id}', 'GradingController@viewGrading')->name('viewGrading');
Route::get('/viewGrading/{id}', 'GradingController@viewGrading')->name('viewGrading');
Route::get('/testGrade', 'GradingController@viewGrading')->name('viewGrading');
Route::post('/searchGrading', 'GradingController@searchGrading')->name('searchGrading');

//Repository
Route::get('/repository', 'RepositoryController@index')->name('repository');
Route::post('/searchRepository', 'RepositoryController@searchRepository')->name('searchRepository');
Route::get('/viewRepository', 'RepositoryController@viewRepository')->name('viewRepository');

// Reporting
Route::get('/reporting', 'ReportingController@index')->name('reporting');


//testing
Route::get('/testing', 'Test@index')->name('testing');

Route::get('/test1', function () {
    return view('grading.testGrade');
});

Route::get('/test2', function () {
    return view('grading.updateGrading1');
});

//bcrypt
Route::get('/test', function () {
    $password = bcrypt("password");
   echo $password;
});
