@extends('layout')

@section('content')
<h1> Edit Post </h1>
<hr/>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method='POST' class=form-group action='/view/{{ $post->id }}'>
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                 Title
                <input name="title" type="text" class="form-control" value = "{{ $post->title }}" />
                Content
                <textarea name="body" class="form-control" >{{ $post->body }}</textarea>
                <br>
                <button type="submit" class="btn btn-success"> Submit</button>
            </form>
        </div>
    </div>
@stop