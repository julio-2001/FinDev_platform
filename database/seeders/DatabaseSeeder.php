<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CandidatesTableSeeder;
use Database\Seeders\JobsTableSeeder;
use Database\Seeders\ExperiencesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this -> call(ExperiencesTableSeeder::class);
       $this -> call(CandidatesTableSeeder::class);
       $this -> call(JobsTableSeeder::class);
    }
}
