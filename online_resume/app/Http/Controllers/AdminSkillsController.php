<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Requests\SkillRequest;

class AdminSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        // Validate input
        //$validatedData = $request->validate([
        //    'title' => 'required|string|max:100',
        //    'detail' => 'required|string|max:500',
        //    'stars' => 'required|integer|min:1|max:5',
        //]);

        //Create a new skill
        //Skill::create($validatedData);
        
        //With request class validation
        Skill::create($request->validated());

        //Redirect back with success message
        return redirect()->route('skills.create')->with('success','Skill added successfully!');
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
        return view('admin.skills.edit', compact('skill'));
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
