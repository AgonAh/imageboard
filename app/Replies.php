<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    public function Post(){
        return $this->belongsTo(Posts::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
