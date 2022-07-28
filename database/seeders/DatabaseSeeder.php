<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\HabbitType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Character::factory()->count(12)->create();

        HabbitType::create([
            'name' => 'Gaming',
            'description' => 'This habbit Type is related to Gaming',
        ]);

        HabbitType::create([
            'name' => 'Productivity',
            'description' => 'This habbit Type is related to Productivity',
        ]);

        HabbitType::create([
            'name' => 'Social',
            'description' => 'This habbit Type is related to Social',
        ]);

        HabbitType::create([
            'name' => 'Health',
            'description' => 'This habbit Type is related to Health',
        ]);

        HabbitType::create([
            'name' => 'Finance',
            'description' => 'This habbit Type is related to Finance',
        ]);

        HabbitType::create([
            'name' => 'Relationships',
            'description' => 'This habbit Type is related to Relationships',
        ]);

        HabbitType::create([
            'name' => 'Mindfulness',
            'description' => 'This habbit Type is related to Mindfulness',
        ]);

        HabbitType::create([
            'name' => 'Learning',
            'description' => 'This habbit Type is related to Learning',
        ]);

        HabbitType::create([
            'name' => 'Other',
            'description' => 'This habbit Type is related to Other',
        ]);


    }
}
