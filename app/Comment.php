<?php

namespace App;

use App\Model;
//use App\User;
//use App\Post;

class Comment extends Model
{
    //$comment->post - comment belongs to a post
    public function post(){
        return $this->belongsTo(Post::class);
    }
    
    //$comment->user - comment belongs to user( $comment->user->name - name of user that created the comment
    public function user(){
        return $this->belongsTo(User::class);
    }
}
