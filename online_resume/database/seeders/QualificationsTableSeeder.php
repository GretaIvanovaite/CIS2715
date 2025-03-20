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
        DB::table('qualifications')->insert([
            ['course_title' => 'Microsoft Office Specialist: Excel Associate (Microsoft 365 Apps)',
            'completion_year' => 2024,
            'studied_at' => 'Edge Hill University',
            'grade' => 'passed'],
            ['course_title' => 'Microsoft Certified: Security, Compliance, and Identity Fundamentals',
            'completion_year' => 2024,
            'studied_at' => 'Edge Hill University',
            'grade' => 'passed'],
            ['course_title' => 'Access to Higher Education diploma',
            'completion_year' => 2020,
            'studied_at' => 'Distancelearningcentre.Com Ltd',
            'grade' => 'distinction'],
        ]);
    }
}
