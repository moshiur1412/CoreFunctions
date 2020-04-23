<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use VotableTrait;
    
    protected $guarded = [];
    
    protected $appends = ['created_date', 'favorite_count'];
    
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
        
        return clean($this->bodyHtml());
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
    
    
    public function getExcerptAttribute(){
        return $this->excerpt(250);
    }
    
    public function excerpt($length){
        return str_limit($this->bodyHtml(), $length);
    }
    
    private function bodyHtml(){
        return \Parsedown::instance()->text($this->body);
    }
    
}
