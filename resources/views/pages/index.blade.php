@extends('layout1')

@section('title', 'Homepage')

@section('content')
    <h1>Homepage</h1>

    @foreach($categories as $category)
        <table class="table" align="left" width="1000" border="2" bgcolor="silver">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created-at</th>
                <th scope="col">Updated-at</th>
            </tr>

            <td>{{$category->id}}</td>

            <td>{{$category->title}}</td>
            <td>{{$category->slug}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
            </tr>
        </table>
    @endforeach

    @foreach($tags as $tag)
        <table class="table" align="left" width="1000" border="2" bgcolor="silver">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created-at</th>
                <th scope="col">Updated-at</th>
            </tr>
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->title}}</td>
                <td>{{$tag->slug}}</td>
                <td>{{$tag->created_at}}</td>
                <td>{{$tag->updated_at}}</td>
            </tr>
        </table>
    @endforeach



    @push('scripts')
        <script src="/example.js"></script>
    @endpush
@endsection