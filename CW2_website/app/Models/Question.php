<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'text',
    ];

    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }
}
