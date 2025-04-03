<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('qualifications')->truncate();
        DB::table('qualifications')->insert([
            ['course_title' => 'BSc Web Design, Development and Analytics',
            'completion_year' => 2026,
            'institute_id' => 1,
            'grade' => 'passed'],
        ]);
    }
}
