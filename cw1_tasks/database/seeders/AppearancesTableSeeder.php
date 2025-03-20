<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppearancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('appearances')->insert([
            ['date' => '2025-02-15',
            'event_title' => 'Open mic night',
            'location' => 'Downtown bar',
            'details' => 'Playing at an open mic night'],
            ['date' => '2025-03-10',
            'event_title' => 'The Jazz Collective Live',
            'location' => 'City Square Park',
            'details' => 'Play some smooth jazz in the park'],
            ['date' => '2025-03-18',
            'event_title' => 'Indie Rock Night with The Skyline',
            'location' => 'Gallery 47',
            'details' => 'Great tunes, good vibes, and a lot of fun'],
            ['date' => '2025-03-22',
            'event_title' => 'Acoustic Session',
            'location' => 'Riverside Promenade',
            'details' => NULL]
        ]);
    }
}
