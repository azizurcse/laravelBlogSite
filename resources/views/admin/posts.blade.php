@extends('layouts.admin_master')


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>IMAGE</th>
            <th>CREATED_AT</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key=> $post)
            <tr>
                <td>{{++$key}}</td>
                <td><a href="{{action('PostsController@show', ['id' => $post->id])}}">{{$post->title}}</a></td>
                <td>{{$post->description}}</td>
                <td><img src="{{$post->cover_image}}" alt="" width="200px" height="200px"></td>
                <td>{{$post->created_at}}</td>
                <td><a href="{{route('admin.posts.edit',['id' => $post->id])}}">Edit</a></td>
                {{--<td><a href="{{route('admin.posts.delete',['id' => $post->id])}}">Delete</a></td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
    @endsection