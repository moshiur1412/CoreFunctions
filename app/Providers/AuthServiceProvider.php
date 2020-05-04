<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Question;
use App\Policies\QuestionPolicy;
use App\Models\Answer;
use App\Policies\AnswerPolicy;
use App\Models\Topic;
use App\Policies\TopicPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Question::class => QuestionPolicy::class,
        Answer::class => AnswerPolicy::class,
        Topic::class => TopicPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // \Gate::define('update-question', function($user, $question){
        //     return $user->id === $question->user_id;
        // });

        // \Gate::define('delete-question', function($user, $question){
        //     return $user->id === $question->user_id && $question->answers <= 0 ;
        // });
    }
}
