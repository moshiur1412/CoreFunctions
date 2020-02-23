<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function boot(){
    
        parent::boot();

        static::created(function($answer){
            
            echo "Created done\n";
            $answer->question->increment('answers_count');
            $answer->save();
           
       });

        static::saved(function(){
            echo "Saved done\n";
       });


    }
}
