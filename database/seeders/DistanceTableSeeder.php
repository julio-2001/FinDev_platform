<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('distances')->insert([
            ['start_location_id' => 1, 'end_location_id' => 2, 'distance' => 5],
            ['start_location_id' => 2, 'end_location_id' => 3, 'distance' => 7],
            ['start_location_id' => 2, 'end_location_id' => 4, 'distance' => 3],
            ['start_location_id' => 3, 'end_location_id' => 5, 'distance' => 4],
            ['start_location_id' => 3, 'end_location_id' => 2, 'distance' => 7],
            ['start_location_id' => 5, 'end_location_id' => 3, 'distance' => 4],
            ['start_location_id' => 5, 'end_location_id' => 4, 'distance' => 10],
            ['start_location_id' => 4, 'end_location_id' => 6, 'distance' => 8],

            ['start_location_id' => 2, 'end_location_id' => 1, 'distance' => 5],
            ['start_location_id' => 3, 'end_location_id' => 2, 'distance' => 7],
            ['start_location_id' => 4, 'end_location_id' => 2, 'distance' => 3],
            ['start_location_id' => 5, 'end_location_id' => 3, 'distance' => 4],
            ['start_location_id' => 2, 'end_location_id' => 3, 'distance' => 7],
            ['start_location_id' => 3, 'end_location_id' => 5, 'distance' => 4],
            ['start_location_id' => 4, 'end_location_id' => 5, 'distance' => 10],
            ['start_location_id' => 6, 'end_location_id' => 4, 'distance' => 8],
        ]);
    }
}
