<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $post->comments()->create($request->except('_token'));
        return back();
    }
}
