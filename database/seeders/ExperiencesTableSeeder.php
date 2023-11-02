<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experiences')->insert([
            ['experience' => 'Estagiário'],
            ['experience' => 'Júnior'],
            ['experience' => 'Pleno'],
            ['experience' => 'Sênior'],
            ['experience' => 'Especialista']
        ]);
    }
}
