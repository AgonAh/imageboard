<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    protected $table='chatroom';

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function message(){
        return $this->hasMany(Message::class);
    }
}
