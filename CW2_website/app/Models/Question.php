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
        'required',
        'questionnaire_id',
    ];

    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }

    public function questionOptions(){
        return $this->hasMany(QuestionOption::class)->chaperone();
    }

    public function columnValues(){
        return $this->hasMany(ColumnValue::class)->chaperone();
    }

    public function sliderValue(){
        return $this->hasOne(SliderValue::class)->chaperone();
    }

    public function responses(){
        return $this->hasMany(Response::class, 'question_id')->chaperone();
    }

}
