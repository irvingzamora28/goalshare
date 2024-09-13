<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalStatusesSeeder extends Seeder
{
    public function run()
    {
        DB::table('goal_statuses')->insert([
            // Personal Development Statuses
            ['goal_type_id' => 1, 'status' => 'Not Started'],
            ['goal_type_id' => 1, 'status' => 'Learning'],
            ['goal_type_id' => 1, 'status' => 'Practicing'],
            ['goal_type_id' => 1, 'status' => 'Mastered'],

            // Fitness Statuses
            ['goal_type_id' => 2, 'status' => 'Not Started'],
            ['goal_type_id' => 2, 'status' => 'Training'],
            ['goal_type_id' => 2, 'status' => 'Improving'],
            ['goal_type_id' => 2, 'status' => 'Achieved'],

            // Career Statuses
            ['goal_type_id' => 3, 'status' => 'Not Started'],
            ['goal_type_id' => 3, 'status' => 'Planning'],
            ['goal_type_id' => 3, 'status' => 'Progressing'],
            ['goal_type_id' => 3, 'status' => 'Achieved'],
            ['goal_type_id' => 3, 'status' => 'Celebrating'],

            // Education Statuses
            ['goal_type_id' => 4, 'status' => 'Not Enrolled'],
            ['goal_type_id' => 4, 'status' => 'Enrolled'],
            ['goal_type_id' => 4, 'status' => 'Studying'],
            ['goal_type_id' => 4, 'status' => 'Completed Course'],

            // Hobbies Statuses
            ['goal_type_id' => 5, 'status' => 'Not Started'],
            ['goal_type_id' => 5, 'status' => 'Trying It Out'],
            ['goal_type_id' => 5, 'status' => 'Practicing Regularly'],
            ['goal_type_id' => 5, 'status' => 'Proficient'],
            ['goal_type_id' => 5, 'status' => 'Expert'],

            // Travel Statuses
            ['goal_type_id' => 6, 'status' => 'Planning'],
            ['goal_type_id' => 6, 'status' => 'Booked'],
            ['goal_type_id' => 6, 'status' => 'In Progress'],
            ['goal_type_id' => 6, 'status' => 'Completed Trip'],

            // Health Statuses
            ['goal_type_id' => 7, 'status' => 'Not Started'],
            ['goal_type_id' => 7, 'status' => 'Making Small Changes'],
            ['goal_type_id' => 7, 'status' => 'Building New Habits'],
            ['goal_type_id' => 7, 'status' => 'Lifestyle Achieved'],
        ]);
    }
}
