<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';
require_once '../config/router.php';

$response = $router->dispatch($request);
echo $response->getContent();
///** @var $blade */

//$categories = \Hillel\Model\Category::all();
//$tags = \Hillel\Model\Tag::all();
//compact('categories'); // ['categories' => $categories]

//echo $blade->make('homepage/index', ['categories' => $categories], ['tags' => $tags] )->render();