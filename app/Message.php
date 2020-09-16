<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];
    public function chatroom(){
        return $this->belongsTo(Chatroom::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
