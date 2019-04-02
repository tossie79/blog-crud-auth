<?php

namespace App;

use App\Model;
use Carbon\Carbon;

//use App\Comment;
//use App\User;

class Post extends Model {

    //$post->comment
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    ////get user who created the post
    //post belongs to a user
    public function user() {
        return $this->belongsTo(User::class);
    }

    //Tag relationship (many to many)
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

//adding comment to a post
    public function addComment($body) {
        //Method 1
//        Comment::create([
//            'body'=> $body,
//            'post_id'=>$this->id
//        ]);
        //Method 2
        /**    $this->comments returns a collection associated with the post and when u add create(),
          it sets the id of the post on the new comment cos of the relationship set up( hasMany)
         * */
//        $this->comments()->create([
//            'body' => $body,
//        ]);
        $this->comments()->create(compact('body'));
    }

    public static function archives() {
        return static::selectRaw('YEAR(created_at) year_created, MONTHNAME(created_at) month_created, count(*) published')
                        ->groupBy('year_created', 'month_created')
                        ->orderByRaw(' min(created_at) DESC')
                        ->get()
                        ->toArray();
    }

    public function scopeFilter($query, $filters) {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

}
