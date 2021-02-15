<?php
require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';


/** @var $blade */
$tag= \Hillel\Model\Tag::find($_POST['id']);
echo $blade->make('pages/delete-tag',['tag'=>$tag])->render();



$tag->delete();
header('Location: list-tags.php');
