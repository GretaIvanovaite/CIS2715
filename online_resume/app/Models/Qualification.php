<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Qualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_title',
        'completion_year',
        'institute_id',
        'grade',
    ];

    public function institute(){
        return $this->belongsTo(Institute::class);
    }
}
