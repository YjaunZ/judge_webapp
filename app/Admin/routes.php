<?php

use App\Admin\Controllers\CompanyController;
use App\Admin\Controllers\DataController;
use App\Admin\Controllers\JudgeController;
use App\Admin\Controllers\SoftwareController;
use App\Admin\Controllers\TaskController;
use App\Admin\Controllers\JudgeSubmitController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('task', TaskController::class);
    $router->resource('company', CompanyController::class);
    $router->resource('judge', JudgeController::class);
    $router->resource('total', DataController::class);
    $router->resource('software', SoftwareController::class);
});
