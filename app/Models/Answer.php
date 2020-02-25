<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function boot(){

        parent::boot();

        static::created(function($answer){
            $answer->question->increment('answers_count');
            \Log::info('Req=App\Models\Answer::boot static::created called');
       });

       static::deleted(function ($answer){
        $question = $answer->question;
        $question->decrement('answers_count');

        if($question->best_answer_id == $answer->id){
            $question->best_answer_id = null;
            $question->save();
        }

        \Log::info('Req=App\Models\Answer::boot satic::deleted called');

        });

    }

    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute(){
        return $this->id == $this->question->best_answer_id ? 'vote-accepted' : '';
    }
}
