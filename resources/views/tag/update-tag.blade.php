@extends('layout1')

@section('title', 'Homepage')

@section('content')
    <h1>Changed Tag</h1>
    <br><br>
    <form action="/tag/{{$tag->id}}/update" method="post" >

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{$tag->title}}">
        <label for="slug"> Slug</label>
        <input type="text" name="slug" id="slug" value="{{$tag->slug}}">
        <br><br>
        <input type="submit" >
    </form>
    <a href="/tag/list">List-Tags</a>
@endsection