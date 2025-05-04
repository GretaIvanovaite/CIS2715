<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'question_id',
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
