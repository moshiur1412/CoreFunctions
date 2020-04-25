<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Question extends Model
{
    use VotableTrait;
    
    protected $fillable = ['title', 'body'];

    protected $appends = ['created_date', 'favorites_count', 'body_html', 'is_favorited'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }    

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    // public function setBodyAttribute($value)
    // {
    //     $this->attributes['body'] = clen($value);
    // }

    public function getUrlAttribute()
    {
        return route("questions.show", $this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if ($this->answers_count > 0) {
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute()
    {
        return clean($this->bodyHtml());
    }

    public function answers()
    {
        return $this->hasMany(Answer::class)->orderBy('votes_count', 'DESC');
    }

    public function acceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps(); //, 'question_id', 'user_id');
        // return $this->belongsToMany(User::class, 'favorites', 'question_id', 'user_id')->withTimestamps(); //, 'question_id', 'user_id');

    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }
   
    public function isFavorited()
    {
        if(auth()->check()){

            return $this->favorites()->where('user_id', Auth()->user()->id)->count() > 0;
        }
        return null;
        // dd($this->favorites()->where('user_id', request()->user()->id())->count() > 0);
    }


    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }    

    public function getExcerptAttribute()
    {
        return $this->excerpt(250);
    }

    public function excerpt($length)
    {
        return str_limit(strip_tags($this->bodyHtml()), $length);
    }

    private function bodyHtml()
    {
        return \Parsedown::instance()->text($this->body);
    }
}