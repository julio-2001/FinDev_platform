<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1,10) as $index){
            DB::table('jobs')->insert([
                'company' => $faker -> company(),
                'title' => $faker -> jobTitle() ,
                'description' => $faker -> catchPhrase(),
                'experience' => $faker -> numberBetween(1,5),
                'location' => $faker -> numberBetween(1,5),
                'created_at' => $faker -> date()
            ]);
        }
    }
}
