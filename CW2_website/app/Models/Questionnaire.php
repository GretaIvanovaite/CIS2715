<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'consent',
        'status',
        'user_id',
    ];

    public function questions(){
        return $this->hasMany(Question::class)->chaperone();
    }

    public function responses(){
        return $this->hasManyThrough(Response::class, Question::class);
    }
}
