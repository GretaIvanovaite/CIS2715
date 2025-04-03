<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    //Define which columns can be mass-assigned
    protected $fillable = [
        'title',
        'detail',
        'stars'
    ];
}
