<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    public function boards(){

        return $this->belongsTo(Boards::class);
    }

    public function replies(){
        return $this->hasMany(Replies::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
