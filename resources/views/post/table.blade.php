@extends('layout1')

@section('title', 'Posts')

@section('content')
    <h1>List of Posts</h1>
    @if(isset($_SESSION['message']))
        <div class="alert alert-success" role="alert">
            <p> {{$_SESSION['message']['text']}}</p>
        </div>
    @endif
    <a href="/post/create">Create</a>
    @foreach($posts as $post)
        <table align="left" width="1000" border="2" bgcolor="silver" class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Body</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Created-at</th>
                <th>Updated-at</th>
            </tr>
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->category->title}}</td>
                <td>{{ $post->tags->pluck('title')->join(', ')}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td><td><form action="/post/{{$post->id}}/update" >
                        <input type="submit" value="update" ></form></td><td><form action="/post/{{$post->id}}/delete" method="post">
                        <input type="submit" value="delete" ></form></td>
            </tr>
        </table>
    @endforeach
    @unset($_SESSION['message'])
@endsection