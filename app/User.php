<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //user has many posts
//    returns Post
    public function posts(){
        return $this->hasMany(Post::class);
    }
    //user has many comments
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function publish(Post $post){
         $this->posts()->save($post);
    }
}
