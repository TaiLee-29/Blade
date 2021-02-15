<?php
require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';


/** @var $blade */
$category= \Hillel\Model\Category::find($_POST['id']);
echo $blade->make('pages/delete-category',['category'=>$category])->render();




    $category->delete();
header('Location: list-categories.php');






