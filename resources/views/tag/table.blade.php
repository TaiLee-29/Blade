@extends('layout1')

@section('title', 'Tags')

@section('content')
    <h1>List of Tags</h1>
    @if(isset($_SESSION['message']))
        <div class="alert alert-success" role="alert">
            <p> {{$_SESSION['message']['text']}}</p>
        </div>
    @endif
    <a href="/tag/create">Create</a>
    @foreach($tags as $tag)
        <table align="left" width="1000" border="2" bgcolor="silver" class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created-at</th>
                <th>Updated-at</th>
            </tr>
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->title}}</td>
                <td>{{$tag->slug}}</td>
                <td>{{$tag->created_at}}</td>
                <td>{{$tag->updated_at}}</td><td><form action="/tag/{{$tag->id}}/update" >
                        <input type="submit" value="update" ></form></td><td><form action="/tag/{{$tag->id}}/delete" method="post">
                        <input type="submit" value="delete" ></form></td>
            </tr>
        </table>
    @endforeach
    @unset($_SESSION['message'])
@endsection