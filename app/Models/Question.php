<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class Question extends Model
{
    public function user(){
        return $this->belogsTo(User::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
