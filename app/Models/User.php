<?php

namespace App\models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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

    // protected $guarded = [];

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
        return "#";
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

       return  $this->_vote($voteQuestions, $question, $vote);

    }


    public function voteAnswer(Answer $answer, $vote){
        
       $voteAnswers = $this->voteAnswers();
        
       return $this->_vote($voteAnswers, $answer, $vote);

    }

    private function _vote($relationship, $model, $vote){

         if($relationship->where('votable_id', $model->id)->exists()){
            $relationship->updateExistingPivot($model, ['vote' => $vote]);
        }
        else{
            $relationship->attach($model, ['vote' => $vote]);
        }

        $model->load('votes');
        $upVotes = (int) $model->upVotes()->sum('vote');
        $downVotes = (int) $model->downVotes()->sum('vote');

        $model->votes_count = $upVotes + $downVotes;
        $model->save();

        return $model->votes_count;
    }



    public function getJWTIdentifier()
    {
        // Get the identifier that will be stored in the subject claim of the JWT.
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // Return a key value array, containing any custom claims to be added to the JWT.
        return [];
    }


    public function Topics(){
        // user->topics
        return $this->hasMany(Topic::class);
    }

    public function Posts(){
        // user->posts
        return $this->hasMany(Post::class);
    }

    public function Likes(){
        // user->Likes
        return $this->hasMany(Like::class);
    }

    public function ownsPost(Post $post){
        // $user->ownPost($post);
        return $this->id === $post->user->id;
    }

    public function ownsTopic(Topic $topic){
        // $user->ownTopic($topic);
        return $this->id === $topic->user->id;
    }

   
}
