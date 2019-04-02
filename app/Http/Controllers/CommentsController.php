<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller {

    //
    public function store(Post $post) {
        
        //Add Comment to a post
       //Method 1
//        Comment::create([
//            'body'=> request('body'),
//            'post_id'=>$post->id
//        ]);
        //Method 2
        $this->validate(request(),[
            'body'=>'required|min:2'
        ]);
        $body = request('body');
        $post->addComment($body);
        return back();
        
    }

}
