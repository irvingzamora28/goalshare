<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalsSeeder extends Seeder
{
    public function run()
    {
        DB::table('goals')->insert([
            [
                'goal_type_id' => 1,
                'title' => 'Learn a new language',
                'description' => 'Become proficient in a new language within 6 months'
            ],
            [
                'goal_type_id' => 2,
                'title' => 'Run a marathon',
                'description' => 'Train and complete a marathon in 12 months'
            ],
            [
                'goal_type_id' => 3,
                'title' => 'Get a promotion',
                'description' => 'Work towards a promotion by improving skills and performance at work'
            ],
            [
                'goal_type_id' => 4,
                'title' => 'Complete an online course',
                'description' => 'Finish an online course in a subject of interest within 3 months'
            ],
            [
                'goal_type_id' => 5,
                'title' => 'Learn to play guitar',
                'description' => 'Take lessons and practice regularly to learn guitar'
            ],
            [
                'goal_type_id' => 6,
                'title' => 'Visit 5 countries',
                'description' => 'Plan trips to visit 5 new countries'
            ],
            [
                'goal_type_id' => 7,
                'title' => 'Adopt a healthy diet',
                'description' => 'Transition to a healthier diet over the next 3 months'
            ],
        ]);
    }
}
