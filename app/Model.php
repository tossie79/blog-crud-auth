<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent {

//    protected $fillable=['title','body']; //variables u r okay with being mass assigned, what will be allowed when you submit the form
    protected $guarded = []; // fields you dont want to mass assign  in the form.(Will not go through when you submit the form. Opposite of fillable

}
