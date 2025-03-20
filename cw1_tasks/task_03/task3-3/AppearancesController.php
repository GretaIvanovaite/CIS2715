<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appearance;

class AppearancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appearances = appearance::all();
        return view('admin.appearances.index', ['appearances' => $appearances]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.appearances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'event_title' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'details' => 'string|max:500',
        ]);

        Appearance::create($validatedData);

        return redirect()->route('appearances.create')->with('success','Appearance information added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
