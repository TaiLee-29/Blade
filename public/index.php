<?php

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';

/** @var $blade */

$categories = \Hillel\Model\Category::all();
//compact('categories'); // ['categories' => $categories]

echo $blade->make('pages/index', ['categories' => $categories])->render();