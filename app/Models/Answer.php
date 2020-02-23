<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
