<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            ['location' => 'A'],
            ['location' => 'B'],
            ['location' => 'C'],
            ['location' => 'D'],
            ['location' => 'E'],
            ['location' => 'F'],
        ]);
    }
}
