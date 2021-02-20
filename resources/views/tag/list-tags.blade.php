@extends('layout1')

@section('title', 'Tags')

@section('content')
    <h1>List of Tags</h1>
    <a href="/tag/create">Create</a>
    @foreach($tags as $tag)
        <table align="left" width="1000" border="2" bgcolor="silver">
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
@endsection