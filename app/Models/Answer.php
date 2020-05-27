<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\VotableTrait;

class Answer extends Model
{
    use VotableTrait;
    
    protected $guarded = [];

    protected $appends = ['created_date', 'body_html', 'status', 'is_best'];

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
            \Log::info('Req=App/Models/Answer::boot static::created called');
       });

       static::deleted(function ($answer){
        $question = $answer->question;
        $question->decrement('answers_count');

        if($question->best_answer_id == $answer->id){
            $question->best_answer_id = null;
            $question->save();
        }

        \Log::info('Req=App/Models/Answer::boot satic::deleted called');

        });

    }

    public function getBodyHtmlAttribute(){
        return clean(\Parsedown::instance()->text($this->body));
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute(){
        return $this->isBest() ? 'vote-accepted' : '';
        // return 'vote-accepted';
    }

    public function getIsBestAttribute(){
        return $this->isBest();
    }

    public function isBest(){
        return $this->id == $this->question->best_answer_id;
    }


}
