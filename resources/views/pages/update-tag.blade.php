@extends('layout1')

@section('title', 'Homepage')

@section('content')
    <h1>Changed Tag</h1>
    <br><br>
    <form action="update-tag.php" method="post" >

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{$tag->title}}">
        <label for="slug"> Slug</label>
        <input type="text" name="slug" id="slug" value="{{$tag->slug}}">
        <input type="hidden" name="hiden" value="hiden">
        <input type="hidden" name="id" value="{{$tag->id}}">
        <br><br>
        <input type="submit" >
    </form>
    <a href="list-tags.php">List-Tags</a>
@endsection