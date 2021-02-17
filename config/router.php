<?php

use Illuminate\Events\Dispatcher;


$request = \Illuminate\Http\Request::createFromGlobals();

function request(){
    global $request;

    return $request;
}
$dispatcher = new Dispatcher();
$container = new \Illuminate\Container\Container();
$router = new \Illuminate\Routing\Router($dispatcher, $container);

function router(){
    global $router;

    return  $router;

}
//Categories
$router->get('/','Hillel\Controller\HomeController@home');
$router->get('/category/create','Hillel\Controller\HomeController@createC');
$router->post('/category/create','Hillel\Controller\HomeController@storeC');
$router->get('/category/{id}/update','Hillel\Controller\HomeController@updateC');
$router->post('/category/{id}/update','Hillel\Controller\HomeController@editC');
$router->post('/category/{id}/delete','Hillel\Controller\HomeController@destroyC');
$router->get('/category/list','Hillel\Controller\HomeController@listC');

//Tags
$router->get('/tag/list','Hillel\Controller\HomeController@listT');
$router->get('/tag/create','Hillel\Controller\HomeController@createT');
$router->post('/tag/create','Hillel\Controller\HomeController@storeT');
$router->get('/tag/{id}/update','Hillel\Controller\HomeController@updateT');
$router->post('/tag/{id}/update','Hillel\Controller\HomeController@editT');
$router->post('/tag/{id}/delete','Hillel\Controller\HomeController@destroyT');
