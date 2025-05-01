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

    public function questionOption(){
        return $this->hasMany(QuestionOption::class)->chaperone();
    }

    public function columnValue(){
        return $this->hasMany(ColumnValue::class)->chaperone();
    }
}
