<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalTypesSeeder extends Seeder
{
    public function run()
    {
        DB::table('goal_types')->insert([
            ['name' => 'Personal Development'],
            ['name' => 'Fitness'],
            ['name' => 'Career'],
            ['name' => 'Education'],
            ['name' => 'Hobbies'],
            ['name' => 'Travel'],
            ['name' => 'Health'],
        ]);
    }
}
