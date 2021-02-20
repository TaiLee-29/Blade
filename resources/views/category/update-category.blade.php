@extends('layout1')

@section('title', 'Homepage')

@section('content')
    <h1>New Category</h1>
    <br><br>
    <form action="/category/{{$category->id}}/update" method="post" >

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{$category->title}}">
        <label for="slug"> Slug</label>
        <input type="text" name="slug" id="slug" value="{{$category->slug}}">


        <br><br>
        <input type="submit" >
    </form>
    <a href="/category/list">List-Categories</a>
@endsection