<?php

namespace App\Http\Controllers;
use App\Models\Questionnaire;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::where('status', '=', 'Live')->get();
        return view('home')->with('questionnaires', $questionnaires);
    }

    public function thankyou()
    {
        return view('thankyou');
    }

    public function cancel()
    {
        return view('cancel');
    }
}
