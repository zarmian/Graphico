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
<<<<<<< HEAD
    return view ('admin/auth/menu');
});
=======
    echo "Hello Admin";
})->middleware('admin');
>>>>>>> old_a/master
 
Route::get('/Freelancer', function(){
    return view('freelancer');
})->middleware('Freelancer');
 
Route::get('/client', function(){
<<<<<<< HEAD
    return view('client');
})->middleware('client');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Auth::routes();
Route::group(['middleware' => ['auth']], function () { 


Route::post('send-message','WorkspaceController@store');
Route::get('/show/{chat}',  'WorkspaceController@show');
Route::get('json','WorkspaceController@jsonResponse');
=======
    return view('imageManipulation');
})->middleware('client');


//Image manipulation routes
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Route::resource('image', 'ImageController');
//

Route::get('intervention-ajax-image-upload', 'ImageController@AjaxIndex');
Route::post('intervention-ajax-image-upload', 'ImageController@AjaxStore');



Route::post('intervention-rotate-90', 'ImageController@AjaxRotate90');
Route::post('intervention-rotate-180', 'ImageController@AjaxRotate180');
Route::post('intervention-rotate-270', 'ImageController@AjaxRotate270');
Route::post('intervention-rotate-360', 'ImageController@AjaxRotate360');

Route::post('intervention-flip-v', 'ImageController@AjaxflipVertical');
Route::post('intervention-flip-h', 'ImageController@AjaxflipHorizontal');

Route::post('intervention-blur', 'ImageController@Ajaxblur');

Route::post('intervention-colorize-green', 'ImageController@AjaxColorizeGreen');
Route::post('intervention-colorize-red', 'ImageController@AjaxColorizeRed');
Route::post('intervention-colorize-blue', 'ImageController@AjaxColorizeBlue');
Route::post('intervention-colorize-greyScale', 'ImageController@AjaxColorizeGreyScale');

Route::post('intervention-pixelate', 'ImageController@AjaxPixelate');


Route::post('intervention-sharpen-l', 'ImageController@AjaxSharpenL');
Route::post('intervention-sharpen-m', 'ImageController@AjaxSharpenM');
Route::post('intervention-sharpen-h', 'ImageController@AjaxSharpenH');

Route::post('intervention-brightness-l', 'ImageController@AjaxBrightnessL');
Route::post('intervention-brightness-m', 'ImageController@AjaxBrightnessM');
Route::post('intervention-brightness-h', 'ImageController@AjaxBrightnessH');

Route::post('intervention-contrast-l', 'ImageController@AjaxContrastL');
Route::post('intervention-contrast-m', 'ImageController@AjaxContrastM');
Route::post('intervention-contrast-h', 'ImageController@AjaxContrastH');

Route::post('intervention-gamma-l', 'ImageController@AjaxGammaL');
Route::post('intervention-gamma-m', 'ImageController@AjaxGammaM');
Route::post('intervention-gamma-h', 'ImageController@AjaxGammaH');

Route::post('intervention-add-text', 'ImageController@Ajaxtext');

Route::post('intervention-crop', 'ImageController@AjaxCrop');
//
//Route::post('image', 'ImageController@rotate');


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');







Auth::routes();
Route::group(['middleware' => ['auth']], function () { 
>>>>>>> old_a/master

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
<<<<<<< HEAD
});

Route::group(['prefix' => 'api'], function () use ($router) {
    Route::get('getPlans', 'PlansController@getPlans');
    Route::get('generatePayLink/{productId}', 'PlansController@generatePayUrl');
    Route::get('thanks/', 'PlansController@thankYouMessage');
});
Route::get('plans', 'PlansController@getPlansWeb');
=======
});
>>>>>>> old_a/master
