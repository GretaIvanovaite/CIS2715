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
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function question(){
        return $this->hasMany(Question::class)->chaperone();
    }
}
