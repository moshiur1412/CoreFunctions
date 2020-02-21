<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;
class Question extends Model
{
   
    public function user(){
        return $this->belongsTo(User::class);
    }

    // $question = Question::find(1);
    // $question->user->name();

    public function setTitleAttribute($vlaue){
        $this->attributes['title'] = $vlaue;
        $this->attributes['slug'] = Str::slug($vlaue);
    }
}
