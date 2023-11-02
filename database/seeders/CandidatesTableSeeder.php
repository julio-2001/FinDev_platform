<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1,15) as $index){
            DB::table('candidates')->insert([
                'nome' => $faker -> name(),
                'profissao' => $faker -> jobTitle() ,
                'experience' => $faker -> numberBetween(1,5),
                'location' => $faker -> numberBetween(1,5)
            ]);
        }
    }
}
