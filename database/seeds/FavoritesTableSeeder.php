<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('favorites')->delete();
        \Log::info('Req=FavoritesTableSeeder@run favorites Table Deleted');

        $users = User::pluck('id')->all();
        $numberOfUsers = count($users);

        foreach(Question::all() as $question){
            for($i=0; $i < rand(0, $numberOfUsers); $i++){

                $user = $users[$i];

               $question->favorites()->attach($user);
            }
        }

    }
}
