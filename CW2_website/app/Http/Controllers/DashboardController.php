<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$questionnaires = Questionnaire::where('user_id', '=', $userID)->get();
        $questionnaires = Questionnaire::all();
        return view('user.dashboard')->with('questionnaires', $questionnaires);
    }
}