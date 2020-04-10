<?php

namespace App\models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Question;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $appends = ['url', 'gravatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function questions(){

        return $this->hasMany(Question::class);
    }

    public function getUrlAttribute(){
        return '#';
    }

    public function getGravatarAttribute(){
        $email = $this->email;
        $size = 32;

        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ). "?s=" . $size;

    }

    public function favorites(){

        return $this->belongsToMany(Question::class, 'favorites')->withTimestamps();

    }

    public function voteQuestions(){

           return $this->morphedByMany(Question::class, 'votable')->withTimestamps();
    }

    public function voteAnswers(){

        return $this->morphedByMany(Answer::class, 'votable')->withTimestamps();
    }

    public function voteQuestion(Question $question, $vote){
        
        $voteQuestions = $this->voteQuestions();

        $this->_vote($voteQuestions, $question, $vote);

    }


    public function voteAnswer(Answer $answer, $vote){
        
       $voteAnswers = $this->voteAnswers();
        
       $this->_vote($voteAnswers, $answer, $vote);

    }

    private function _vote($relationship, $modal, $vote){

         if($relationship->where('votable_id', $modal->id)->exists()){
            $relationship->updateExistingPivot($modal, ['vote' => $vote]);
        }
        else{
            $relationship->attach($modal, ['vote' => $vote]);
        }

        $modal->load('votes');
        $upVotes = (int) $modal->upVotes()->sum('vote');
        $downVotes = (int) $modal->downVotes()->sum('vote');

        $modal->votes_count = $upVotes + $downVotes;
        $modal->save();
    }

    
}
