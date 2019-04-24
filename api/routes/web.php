<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return response()->json([
        "app_name" => "Shopify Simple API",
        "api_version" => "1.0.0"
    ]);
});

$router->group(['prefix' => 'v1', 'middleware' => 'jwt.auth'], function () use ($router) {
    $router->post('/shop', 'ShopsController@createShop');
    $router->post('/shop/{shop_id}/product', 'ProductsController@createProduct');
    $router->post('/shop/{shop_id}/feed', 'ShopsController@createShopFeed');
});


$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->post('create/user', 'UsersController@createUser');
    $router->get('/shops', 'ShopsController@getShops');
    $router->get('/feeds', 'FeedsController@getFeeds');
    $router->get('/feeds/{feed_id}', 'FeedsController@getFeed');
});
