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


Route::get('/run', function(){
    return view('project.competition.run');
});
Route::get('/admin', function(){
    echo "Hi Admin";
})->middleware('admin');
 
Route::get('/Freelancer', function(){
    return view('freelancer');
})->middleware('Freelancer');
 
Route::get('/client', function(){
    return view('client');
})->middleware('client');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Auth::routes();
Route::group(['middleware' => ['auth']], function () { 

Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/posted', 'ProjectsController@posted');
Route::get('/projects/create', 'ProjectsController@create');
Route::get('/projects/myproject', 'ProjectsController@myproject');
Route::get('project/competition/create', 'CompetitionController@create');
Route::get('/download/competition/{file}', 'CompetitionController@download');
Route::get('/download/project/{file}', 'ProjectsController@download');
Route::get('/download/submit/{file}', 'WorkspaceController@download');
Route::get('/projects/workspace/{project}', 'ProjectsController@workspace');

Route::patch('project/{project}/archive','Projectscontroller@archive');
Route::patch('project/{project}/active','Projectscontroller@active');
Route::patch('project/{project}/bid','Projectscontroller@bid');
Route::post('project/{project}/assign/{u_id}','Projectscontroller@assign');


Route::post('post-project', 'ProjectsController@store')->name('store');
Route::post('post-competition', 'CompetitionController@store')->name('store');
Route::patch('/submit-project/{project}', 'ProjectsController@submit')->name('submit');

Route::resource('projects','ProjectsController');
});