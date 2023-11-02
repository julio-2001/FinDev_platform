<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CandidatesTableSeeder;
use Database\Seeders\JobsTableSeeder;
use Database\Seeders\ExperiencesTableSeeder;
use Database\Seeders\LocationTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this -> call(LocationTableSeeder::class);
        $this -> call(ExperiencesTableSeeder::class);
        $this -> call(CandidatesTableSeeder::class);
        $this -> call(JobsTableSeeder::class);
    }
}
