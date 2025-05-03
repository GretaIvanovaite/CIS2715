<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];

    public function questions(){
        return $this->hasMany(Question::class)->chaperone();
    }
}
