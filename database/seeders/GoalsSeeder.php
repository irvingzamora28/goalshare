<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalsSeeder extends Seeder
{
    public function run()
    {
        DB::table('goals')->insert([
            ['title' => 'Learn a new language', 'description' => 'Learn a new language from scratch or improve proficiency'],
            ['title' => 'Run a marathon', 'description' => 'Train and complete a full marathon'],
            ['title' => 'Get a job promotion', 'description' => 'Work towards getting a promotion at your current job'],
            ['title' => 'Visit 10 countries', 'description' => 'Travel to at least 10 different countries'],
            ['title' => 'Start a new hobby', 'description' => 'Pick up a new hobby and practice it regularly'],
        ]);

        // Linking goals to their types using the pivot table goal_goal_type
        DB::table('goal_goal_type')->insert([
            // Learn a new language: Personal Development, Education
            ['goal_id' => 1, 'goal_type_id' => 1], // Personal Development
            ['goal_id' => 1, 'goal_type_id' => 4], // Education

            // Run a marathon: Fitness, Health
            ['goal_id' => 2, 'goal_type_id' => 2], // Fitness
            ['goal_id' => 2, 'goal_type_id' => 7], // Health

            // Get a job promotion: Career
            ['goal_id' => 3, 'goal_type_id' => 3], // Career

            // Visit 10 countries: Travel
            ['goal_id' => 4, 'goal_type_id' => 6], // Travel

            // Start a new hobby: Hobbies, Personal Development
            ['goal_id' => 5, 'goal_type_id' => 5], // Hobbies
            ['goal_id' => 5, 'goal_type_id' => 1], // Personal Development
        ]);
    }
}
