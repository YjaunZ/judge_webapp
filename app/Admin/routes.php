<?php

use App\Admin\Controllers\BuilderController;
use App\Admin\Controllers\CheckController;
use App\Admin\Controllers\CompanyController;
use App\Admin\Controllers\DataController;
use App\Admin\Controllers\JudgeController;
use App\Admin\Controllers\PersonInfoController;
use App\Admin\Controllers\Setting;
use App\Admin\Controllers\SoftwareController;
use App\Admin\Controllers\SystemController;
use App\Admin\Controllers\TaskController;
use App\Admin\Controllers\JudgeSubmitController;
use App\Models\PersonInfo;
use App\Models\System;
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
    $router->resource('check', CheckController::class);
    $router->resource('builder', BuilderController::class);
    $router->resource('system',SystemController::class);
    $router->resource('data',DataController::class);
    $router->resource('personinfo', PersonInfoController::class);
});
