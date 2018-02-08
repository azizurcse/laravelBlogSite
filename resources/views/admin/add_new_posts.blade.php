@extends('layouts.admin_master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['route' => 'admin.posts.save','class'=>'form-horizontal','files' => true]) !!}
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>

            {{Form::text('title', null,['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            {{Form::textarea('description', null,['class' => 'form-control'])}}
        </div>
    <div class="form-group">
        <label for="exampleInputPassword1">File</label>
        {{Form::file('cover_image', [])}}
    </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
    @endsection