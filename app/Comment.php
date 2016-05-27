<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['message'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
