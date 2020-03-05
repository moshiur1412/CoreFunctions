<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

class VotableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('votables')->where('votable_type', 'App\Models\Question')->delete();

        $users = User::all();
        $numberOfUser = $users->count();
        $votes = [-1, 1];

        foreach(Question::all() as $question){
            for($i=0; $i < rand(1, $numberOfUser); $i++){
                $user = $users[$i];
                $user->voteQuestion($question, array_rand($votes));

            }

        }

        // foreach(Answer::all() as $answers){
        //     for($i=0; $i < rand(1, $numberOfUser); $i++){
        //         $user = $users[$i];
        //         $user->voteAnswers()->attach($answers, ['vote' => array_rand($votes)]);
        //     }

        // }


    }
}
