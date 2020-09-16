<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boards extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';



    public function posts(){
        return $this->hasMany(Posts::class);
    }
}
