<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institute extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'street',
        'town',
        'postcode',
    ];

    public function qualification(){
        return $this->hasMany(Qualification::class);
    }
}
