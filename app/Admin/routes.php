<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\EmployeeController;
use App\Admin\Controllers\CategoryController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('employees', EmployeeController::class);
    //あとで消すこと
    $router->resource('categories', CategoryController::class);

});
