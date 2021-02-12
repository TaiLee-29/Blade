@extends('layout')

@section('title', 'Homepage')

@section('content')
    <h1>New Category</h1>
    <br><br>
    <form action="create-category.php" method="post" >

        <label for="title">Title</label>
        <input type="text" name="title" id="title" >
        <label for="slug"> Slug</label>
        <input type="text" name="slug" id="slug" >
        <br><br>
        <input type="submit" >
    </form>
    <a href="list-categories.php">List-Categories</a>
@endsection