<?php

namespace App\Repositories;

use App\Post;
use App\Redis;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Posts {

    protected $redis;
    public function __construct(Redis $redis) {
        $this->redis = $redis;
    }

    public function all() {
        //returns all relevant posts
        return Post::all();
    }

    public function find() {
        
    }

}
