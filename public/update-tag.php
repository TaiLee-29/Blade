<?php
require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';


/** @var $blade */
$tag= \Hillel\Model\Tag::find($_POST['id']);
echo $blade->make('pages/update-tag',['tag'=>$tag])->render();

//var_dump($_POST);
//if ($_SERVER['REQUEST_METHOD'] === 'POST'){
if(isset($_POST['hiden']))

{
    $tag= \Hillel\Model\Tag::find($_POST['id']);
    $tag->title = $_POST['title'];
    $tag->slug = $_POST['slug'];
    $tag->save();

}
