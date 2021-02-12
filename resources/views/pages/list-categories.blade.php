@extends('layout')

@section('title', 'Homepage')

@section('content')
    <h1>List of categories</h1>

    <a href="create-category.php">Create</a>

    @foreach($categories as $category)
        <table align="left" width="1000" border="2" bgcolor="silver">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created-at</th>
                <th>Updated-at</th>
            </tr>

                <td>{{$category->id}}</td>

                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td><td><form action="update-category.php" method="post">
                <input type="hidden" name='id' value="{{$category->id}}">
                <input type="submit" value="update" ></form></td><td><form action="delete-category.php" method="post">
                <input type="hidden" name='id' value="{{$category->id}}">
                <input type="submit" value="delete" ></form></td>
            </tr>
        </table>
    @endforeach
@endsection
