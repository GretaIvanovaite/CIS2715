<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title',
        'start_date',
        'finish_date',
        'employer_name',
        'key_skills'
    ];
}
