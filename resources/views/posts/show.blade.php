@extends('layouts.master')

@section('content')
    <h1>Post details</h1>
    <p>{{$post_details->title}}</p>
    <p>{{$post_details->description}}</p>
    @if (Auth::check())
    {!! Form::open(['url'=>'comments','class'=>'form-horizontal']) !!}
        <div class="form-group">
            {{Form::textarea('description',null,['class'=>'form-control','row'=>3,'placeholder'=>'add comment'])}}
            {{Form::hidden('post_id',$post_details->id)}}
        </div>
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    {!! Form::close() !!}
@endif

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