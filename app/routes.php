<?php

Route::pattern('id', '[0-9]+');

Route::get('/',
    function () {
        return View::make('hello');
    }
);


Route::get('angular-app',
    function () {
        return View::make('example.app');
    }
);

// все пост-запросы прогоняем через csrf фильтр
Route::when('/admin/*', 'csrf', array('post'));

// also see /app/start/global.php
App::missing(function() {
    return Response::view('main.404', array(), 404);
});

Route::group(
    ['prefix' => 'api'],
    function () {
        Route::get(   'humans',       ['as' => 'api.human.index',     'uses' => 'App\Controllers\ExampleApp\HumanController@index']);
        Route::post(  'humans',       ['as' => 'api.human.store',     'uses' => 'App\Controllers\ExampleApp\HumanController@store']);
        Route::get(   'humans/{id}',  ['as' => 'api.human.view',      'uses' => 'App\Controllers\ExampleApp\HumanController@view']);
        Route::put(   'humans/{id}',  ['as' => 'api.human.update',    'uses' => 'App\Controllers\ExampleApp\HumanController@store']);
        Route::delete('humans/{id}',  ['as' => 'api.human.destroy',   'uses' => 'App\Controllers\ExampleApp\HumanController@destroy']);
    }
);


Route::post('upload', ['before' => ['auth', 'can:manage_dashboard'], 'as' => 'uploader', 'uses' => 'Rutorika\Dashboard\Uploader\UploadController@handle']);

/** общие админские роуты */
Route::group(
    array('before' => ['auth', 'can:manage_dashboard'], 'prefix' => 'admin'),
    function () {
        Route::post('sort', '\Rutorika\Sortable\SortableController@sort');
    }
);

Route::group(
    ['before' => ['auth', 'can:manage_dashboard'], 'prefix' => 'admin', 'namespace' => 'App\Controllers\Admin'],
    function () {
        Route::get('/', ['as' => '.main', 'uses' => 'MainController@index']);

        $crudRoutes = [
            ['name' => 'user'],
            ['name' => 'role', 'entityNameSpace' => 'Rico\Auth\\'],

            ['name' => 'human', 'entityNameSpace' => 'App\Entities\\'],
            ['name' => 'pet', 'prefix' => 'human/{human}/'],
        ];

        generate_crud_routes($crudRoutes);
    }
);

Route::group(
    ['namespace' => 'Rico\Auth'],
    function () {
//        Route::get('users/create', 'UsersController@create');
//        Route::post('users', 'UsersController@store');
        Route::get('auth/login', ['as' => 'login', 'uses' => 'UsersController@login']);
        Route::post('auth/login', ['as' => 'do-login', 'uses' => 'UsersController@doLogin']);
//        Route::get('users/confirm/{code}', 'UsersController@confirm');
//        Route::get('users/forgot_password', 'UsersController@forgotPassword');
//        Route::post('users/forgot_password', 'UsersController@doForgotPassword');
//        Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
//        Route::post('users/reset_password', 'UsersController@doResetPassword');
        Route::get('auth/logout', ['as' => 'logout', 'uses' => 'UsersController@logout']);
    }
);

