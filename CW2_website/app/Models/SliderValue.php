<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SliderValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'min',
        'max',
        'step',
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
