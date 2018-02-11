<?php

use Illuminate\Routing\Router;

\Admin::registerAuthRoutes();

\Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/rig', 'RigController@index');
    $router->get('/rig/view/{id}', 'RigController@view');
    $router->get('/rig/check/{id}', 'RigController@check');
    $router->post('/rig/set-config/{id}', 'RigController@setConfig');
});
