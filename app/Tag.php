<?php

namespace App;

use App\Model;

class Tag extends Model {

//Post relationship (many to many)
    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName() {
        return 'name';
    }

}
