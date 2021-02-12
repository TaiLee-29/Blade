<?php
require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';

/** @var $blade */


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $bi = new \Hillel\Model\Tag();
    $bi->title = $_POST['title'];
    $bi->slug = $_POST['slug'];
    $bi->save();

}

echo $blade->make('pages/create-tag')->render();
