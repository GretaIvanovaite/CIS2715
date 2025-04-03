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
        DB::table('experiences')->truncate();
        DB::table('experiences')->insert([
            ['job_title' => 'Associate Content Engineer',
            'start_date' => '2021-08-16',
            'finish_date' => NULL,
            'employer_name' => 'One Advanced Ltd.',
            'key_skills' => 'Creating legal forms following guidance from various legal entities; Using Git and GitHub; Creating and amending macros in the legal form software using Visual Basic; Creating content control-based Word forms; Using Microsoft Office suite programs and Microsoft Teams'],
            ['job_title' => 'Workforce information analyst',
            'start_date' => '2020-12-01',
            'finish_date' => '2021-08-13',
            'employer_name' => 'Warrington and Halton Hospitals NHS Foundation Trust',
            'key_skills' => 'Creating and implementing SCORM packages using Lectora software and the Oracle learning management system; Reporting on Staff Absences, Mandatory Training and other relevant queries; Managing the employee information system - ESR; Extensive use of Microsoft Office packages especially Microsoft Excel, Outlook and Word'],
            ['job_title' => 'Assistant workforce information analyst',
            'start_date' => '2019-12-02',
            'finish_date' => '2020-11-30',
            'employer_name' => 'Warrington and Halton Hospitals NHS Foundation Trust',
            'key_skills' => 'Compiling information from different systems, such as E-Rostering, Patchwork, OLM; Attention to detail and checking work for errors before distribution'],
            ['job_title' => 'Controller',
            'start_date' => '2018-09-05',
            'finish_date' => '2019-11-22',
            'employer_name' => 'Hermes (now Evri)',
            'key_skills' => 'Accumulating information and reporting to the management as requested and within established guidelines and timescales; Utilising internal operating systems and site observations to safely control and monitor the operations; Working with Excel VBA macros and Access databases; Managing performances of staff members and improving productivity'],
            ['job_title' => 'Assistant Controller',
            'start_date' => '2015-06-20',
            'finish_date' => '2018-09-04',
            'employer_name' => 'Hermes (now Evri)',
            'key_skills' => 'Answering internal and external queries; Inputting, updating and manipulating data on Excel; Accumulating information and reporting to the management as requested and within established guidelines and timescales'],
        ]);
    }
}
