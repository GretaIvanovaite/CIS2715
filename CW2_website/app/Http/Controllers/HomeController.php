<?php

namespace App\Http\Controllers;
use App\Models\Questionnaire;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $questionnaires = questionnaire::all();
        return view('home')->with('questionnaires', $questionnaires);
    }
}
