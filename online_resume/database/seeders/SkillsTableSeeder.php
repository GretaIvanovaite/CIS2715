<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            ['title' => 'PHP',
            'detail' => 'Learning to code PHP using vanilla and frameworks like Laravel',
            'stars' => 2],
            ['title' => 'HTML',
            'detail' => 'Writing semantic HTML5',
            'stars' => 4],
            ['title' => 'CSS',
            'detail' => 'Styling HTML using CSS and CSS3',
            'stars' => 4],
            ['title' => 'Python',
            'detail' => 'Working with libraries for data analysis, such as Pandas, SciPy, Matplotlib and more',
            'stars' => 3],
            ['title' => 'Java',
            'detail' => 'Basic knowledge of object oriented programming using Java',
            'stars' => 2],
            ['title' => 'SQL',
            'detail' => 'Writing queries, including subqueries and aggregation functions',
            'stars' => 4],
            ['title' => 'Excel',
            'detail' => 'Extensive work using Excel for data analysis and writing macros for automated tasks',
            'stars' => 4],
            ['title' => 'Docker',
            'detail' => 'Utilising docker containers in software development',
            'stars' => 2],
            ['title' => 'Git and Github',
            'detail' => 'A good understanding of Git and Github, including creating repositories, branches and resetting to a previous commit',
            'stars' => 3],
        ]);
    }
}
