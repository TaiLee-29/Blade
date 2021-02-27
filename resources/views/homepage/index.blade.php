@extends('layout1')

@section('title', 'Homepage')

@section('content')


    <h1>Categories</h1>
    @foreach($pages as $page)
        <table align="left" width="1000" border="2" bgcolor="silver">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created-at</th>
                <th>Updated-at</th>
            </tr>

            <td>{{$page->id}}</td>

            <td>{{$page->title}}</td>
            <td>{{$page->slug}}</td>
            <td>{{$page->created_at}}</td>
            <td>{{$page->updated_at}}</td><td><form action="/category/{{$page->id}}/update" >
                    <input type="submit" value="update" ></form></td><td><form action="/category/{{$page->id}}/delete" method="post">

                    <input type="submit" value="delete" ></form></td>
            </tr>
        </table>
    @endforeach



    @push('scripts')
        <script src="/example.js"></script>
    @endpush
@endsection

@include('paginate')