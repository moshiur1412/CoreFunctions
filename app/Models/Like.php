<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // getting the own model
    public function likeable(){
        // like->likeable();
        return morphTo();
    }
}
