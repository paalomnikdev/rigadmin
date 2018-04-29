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
    $router->delete('/rig/{id}', 'RigController@delete');
    $router->get('/rig/view/{id}', 'RigController@view');
    $router->get('/rig/check/{id}', 'RigController@check');
    $router->get('/rig/reboot/{id}', 'RigController@reboot');
    $router->post('/rig/set-config/{id}', 'RigController@setConfig');
    $router->post('/rig/miner/{id}', 'RigController@miner');
//    $router->get('/wallets', 'WalletsController@index');
//    $router->post('/wallets', 'WalletsController@new');
//    $router->post('/wallets/{id}', 'WalletsController@update');
//    $router->delete('/wallets/{id}', 'WalletsController@delete');
//    $router->get('/wallets/{id}/edit', 'WalletsController@editForm');
//    $router->get('/wallets/create', 'WalletsController@create');
//    $router->get('/pools', 'PoolsController@index');
//    $router->get('/pools/create', 'PoolsController@create');
//    $router->post('/pools', 'PoolsController@new');
//    $router->get('/pools/{id}/edit', 'PoolsController@editForm');
//    $router->post('/pools/{id}', 'PoolsController@update');
//
    $router->resources([
        'commands'    => 'CommandsController',
    ]);
});
