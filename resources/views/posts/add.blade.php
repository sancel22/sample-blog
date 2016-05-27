@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Add New Post</h1>
            <form method='post' class=form-group>
                {{ csrf_field() }}
                 Title
                <input name="title" type="text" class="form-control" />
                Content
                <textarea name="body" class="form-control"></textarea>
                <button type="submit" class="btn btn-success"> Submit</button>
            </form>
            <ul>
                <div class="alert-danger">
                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                </div>
            </ul>
        </div>
    </div>
@stop
