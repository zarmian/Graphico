<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/admin', 'HomeController@index')->name('admin.home');
    $router->resource('projects', ProjectController::class);
    $router->resource('competitions', CompetitionController::class);
    $router->resource('users', WebUserController::class);
    $router->resource('bids', BidController::class);
    $router->resource('assigns', AssignController::class);
});
