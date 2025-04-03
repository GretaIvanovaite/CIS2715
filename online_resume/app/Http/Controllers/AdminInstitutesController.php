<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Http\Requests\InstituteRequest;

class AdminInstitutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutes = institute::all();
        return view('admin.institutes.show', ['institutes' => $institutes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.institutes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstituteRequest $request)
    {
        // Validate input
        //$validatedData = $request->validate([
        //    'title' => 'required|string|max:100',
        //    'detail' => 'required|string|max:500',
        //    'stars' => 'required|integer|min:1|max:5',
        //]);

        //Create a new institute
        //Institute::create($validatedData);
        
        //With request class validation
        Institute::create($request->validated());

        //Redirect back with success message
        return redirect()->route('institutes.create')->with('success','Institute added successfully!');
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
    public function edit(Institute $institute)
    {
        return view('admin.institutes.edit', compact('institute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstituteRequest $request, Institute $institute)
    {
        $institute->update($request->validated());
        return redirect()->route('institutes')->with('success', 'Institute updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institute $institute)
    {
        $institute->delete();
        return redirect()->route('institutes.show')->with('success', 'Institute deleted successfully!');
    }
}
