@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h3>Login</h3>
        <hr>
         {{ var_dump($errors->all()) }}
        <form action="/login" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div>
                <button class="btn btn-success" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop