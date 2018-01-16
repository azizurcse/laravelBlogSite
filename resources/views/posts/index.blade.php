@extends('layouts.master')

@section('content')
<h1>hello laravel</h1>
    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>IMAGE</th>
            <th>CREATED_AT</th>
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $key=> $post)
          <tr>
            <td>{{++$key}}</td>
            <td><a href="{{action('PostsController@show', ['id' => $post->id])}}">{{$post->title}}</a></td>
            <td>{{$post->description}}</td>
            <td><img src="{{$post->cover_image}}" alt=""></td>
            <td>{{$post->created_at}}</td>
          </tr>
            @endforeach
        </tbody>
      </table>
{{ $posts->links() }}
    @endsection