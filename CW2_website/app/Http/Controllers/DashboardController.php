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
        $user_id = auth()->id();
        $questionnaires = Questionnaire::where('user_id', $user_id)->withCount(['responses'])->get();
        return view('user.dashboard')->with('questionnaires', $questionnaires);
    }
}