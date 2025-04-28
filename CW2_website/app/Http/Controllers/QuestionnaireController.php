<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Questionnaire;
Use App\Http\Requests\QuestionnaireRequest;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Adding this here if I need an admin view with ALL questionnaires
        $questionnaires = questionnaire::all();
        return view('questionnaires', ['questionnaires' => $questionnaires]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('questionnaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionnaireRequest $request)
    {
        Questionnaire::create($request->validated());

        return redirect()->route('questionnaires.show')->with('success', 'Questionnaire created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Questionnaire $questionnaire)
    {
        return view('questionnaires.show', compact('questionnaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire)
    {
        return view('questionnaires.edit', compact('questionnaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->update($request->validated());
        return redirect()->route('questionnaires.show')->with('success', 'Questionnaire details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
        return redirect()->route('user.dashboard')-with('success', 'Questionnaire deleted successfully!');
    }
}
