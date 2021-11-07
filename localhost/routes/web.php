<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return $router->app->version();
});


$router->post('api/ad/add', 'AdsController@add');

$router->post('api/ad/{ad_id}/edit/data', 'AdsController@edit');

$router->post('api/ad/{ad_id}/edit/file/delete', 'AdsController@restore');

$router->get('api/ad', 'AdsController@showAll');

$router->get('api/ad/{ad_id}', 'AdsController@showData');

$router->post('api/ad/{ad_id}/proverka', 'AdsController@proverka');
