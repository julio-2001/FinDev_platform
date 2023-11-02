<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CandidatesTableSeeder;
use Database\Seeders\JobsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this -> call(CandidatesTableSeeder::class);
       $this -> call(JobsTableSeeder::class);
    }
}
