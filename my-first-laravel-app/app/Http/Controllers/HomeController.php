<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

}
