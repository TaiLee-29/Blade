<?php
require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';


/** @var $blade */
$category= \Hillel\Model\Category::find($_POST['id']);
echo $blade->make('pages/update-category',['category'=>$category])->render();

//var_dump($_POST);
//if ($_SERVER['REQUEST_METHOD'] === 'POST'){
if(isset($_POST['hiden']))

{
    $category= \Hillel\Model\Category::find($_POST['id']);
    $category->title = $_POST['title'];
    $category->slug = $_POST['slug'];
    $category->save();

    header('Location: list-categories.php');

}

