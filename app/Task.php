<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    //
//    public static function incomplete() {
//        return static::where('complete',0)->get();
//        
//    }

    //Query Scope
     public function scopeIncomplete($query) { //Task::incomplete
        return $query->where('complete',0);
        
    }
}
