@extends('layout')

@section('content')
    <h1>My Posts</h1>
    <hr>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="/add" class="btn btn-primary"> Add Post</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        {{ ( Auth::user() )}}
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item">
                        <a href="{{ $post->path() }}">{{ $post-> title }}</a>
                        <span class="pull-right">
                            <a href="#">{{ $post->user->name ?? '-' }} </a>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop