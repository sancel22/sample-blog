@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $post -> title }}</h1>
            <p>{{ $post -> body }}</p>
            <hr/>
            <b>Comments:</b>
            <ul>
            @foreach($post->comments as $comment)
                <li>{{ $comment->message }}</li>
            @endforeach
            </ul>
            <section>
                <form action="/view/{{ $post->id }}/comments" method="post">
                    {{ csrf_field() }}
                    <textarea name="message" class="form-control"></textarea>
                    <button class="btn btn-success" type='Submit'>Send</button>
                </form>
            </section>
        </div>
    </div>
@stop
