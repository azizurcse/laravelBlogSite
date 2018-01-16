@extends('layouts.master')

@section('content')
    <h1>Post details</h1>
    <p>{{$post_details->title}}</p>
    <p>{{$post_details->description}}</p>

    @foreach($post_details->comments as $comment)
    <div class="media">
        <div class="media-left">
            <span class="glyphicon glyphicon-user"></span>
        </div>
        <div class="media-body">

            <p>{{$comment->description}}-{{$comment->user->name}}</p>
        </div>
    </div>
    @endforeach
@endsection