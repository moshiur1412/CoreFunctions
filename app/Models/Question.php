<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlAttribute(){
        return route('questions.show', $this->slug);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute(){
        if($this->answers_count >0){
            if($this->best_answer_id){
                return 'answer-accepted';
            }
            return 'answered';
        }
        return 'unanswered';
    }

    public function getBodyHtmlAttribute(){

        return \Parsedown::instance()->text($this->body);
    }

   public function answers(){
       return $this->hasMany(Answer::class);
   }

   public function acceptBestAnswer(Answer $answer){
        $this->best_answer_id = $answer->id;
        $this->save();
   }

   public function favorites(){

      return  $this->belongsToMany(User::class, 'favorites')->withTimestamps();
   }

   public function getFavoriteCountAttribute(){
       return $this->favorites()->count();
   }

   public function isFavorite(){
    return $this->favorites()->where('user_id', auth()->id())->count() > 0;
   }


    public function votes(){
        return $this->morphToMany(User::class, 'votable');
    }
}
