@extends('layout1')

@section('title', 'Homepage')

@section('content')
    <h1>New Category</h1>
    <br><br>
    <form action="update-category.php" method="post" >

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{$category->title}}">
        <label for="slug"> Slug</label>
        <input type="text" name="slug" id="slug" value="{{$category->slug}}">
        <input type="hidden" name="hiden" value="hiden">
        <input type="hidden" name="id" value="{{$category->id}}">
        <br><br>
        <input type="submit" >
    </form>
    <a href="list-categories.php">List-Categories</a>
@endsection