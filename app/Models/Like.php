<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\User;

class Like extends Model
{
    // getting the own model
    public function likeable(){
        // like->likeable();
        return $this->morphTo();
    }

    public function user(){
        //like->user
        return $this->belongsTo(User::class);
    }
}
