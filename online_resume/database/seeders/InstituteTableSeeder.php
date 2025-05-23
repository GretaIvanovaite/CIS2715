<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstituteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('institutes')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('institutes')->insert([
            ['name' => 'Edge Hill University',
            'street' => 'St Helens Rd',
            'town' => 'Ormskirk',
            'postcode' => 'L39 4QP'
            ],
        ]);
    }
}
