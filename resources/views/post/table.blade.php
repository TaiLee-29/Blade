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
    @foreach($pages as $page)
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
                <td>{{$page->id}}</td>
                <td>{{$page->title}}</td>
                <td>{{$page->slug}}</td>
                <td>{{$page->body}}</td>
                <td>{{$page->category->title}}</td>
                <td>{{ $page->tags->pluck('title')->join(', ')}}</td>
                <td>{{$page->created_at}}</td>
                <td>{{$page->updated_at}}</td><td><form action="/post/{{$page->id}}/update" >
                        <input type="submit" value="update" ></form></td><td><form action="/post/{{$page->id}}/delete" method="post">
                        <input type="submit" value="delete" ></form></td>
            </tr>
        </table>
    @endforeach
    @unset($_SESSION['message'])
@endsection
@include('paginate')