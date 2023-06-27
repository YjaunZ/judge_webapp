<?php

use App\Admin\Controllers\CompanyController;
use App\Admin\Controllers\JudgeController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('company', CompanyController::class);
    $router->resource('judge', JudgeController::class);
});
