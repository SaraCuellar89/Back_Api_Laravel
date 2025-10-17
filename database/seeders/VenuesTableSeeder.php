<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('venues')->insert([
            ['name' => 'State of France', 'location' => 'Saint-Denis'],
            ['name' => 'Arena Bercy', 'location' => 'París'],
            ['name' => 'Roland Garros', 'location' => 'París'],
            ['name' => 'Vélodrome National', 'location' => 'Saint-Quentin'],
            ['name' => 'Grand Palais', 'location' => 'París'],
        ]);
    }
}
