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
$router->get('/','Hillel\Controller\CategoryController@home');
$router->get('/category/create','Hillel\Controller\CategoryController@createC');
$router->post('/category/create','Hillel\Controller\CategoryController@storeC');
$router->get('/category/{id}/update','Hillel\Controller\CategoryController@updateC');
$router->post('/category/{id}/update','Hillel\Controller\CategoryController@editC');
$router->post('/category/{id}/delete','Hillel\Controller\CategoryController@destroyC');
$router->get('/category/list','Hillel\Controller\CategoryController@listC');

//Tags
$router->get('/tag/list','Hillel\Controller\TagController@listT');
$router->get('/tag/create','Hillel\Controller\TagController@createT');
$router->post('/tag/create','Hillel\Controller\TagController@storeT');
$router->get('/tag/{id}/update','Hillel\Controller\TagController@updateT');
$router->post('/tag/{id}/update','Hillel\Controller\TagController@editT');
$router->post('/tag/{id}/delete','Hillel\Controller\TagController@destroyT');
