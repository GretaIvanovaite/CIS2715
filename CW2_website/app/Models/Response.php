<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'option_id',
        'selection',
        'text_answer',
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function questionOption(){
        return $this->belongsTo(QuestionOption::class);
    }
}
