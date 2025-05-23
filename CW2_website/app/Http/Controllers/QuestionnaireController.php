<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Questionnaire;
Use App\Http\Requests\QuestionnaireRequest;
Use App\Models\Question;
Use App\Models\QuestionOption;
Use App\Models\ColumnValue;
Use App\Models\SliderValue;


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

        return redirect()->route('dashboard')->with('success', 'Questionnaire created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Questionnaire $questionnaire)
    {
        $questions = Question::where('questionnaire_id', $questionnaire->id)->withCount(['questionOptions', 'columnValues', 'responses'])->get();
    
        return view('questionnaires.show', compact('questionnaire', 'questions'));
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
        return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Questionnaire details updated successfully!');
    }

    /**
     * Update the squestionnaire status from the user dashboard.
     */
    public function status(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->update($request->validated());
        return redirect()->route('dashboard')->with('success', 'Questionnaire status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->questions->each->delete();
        $questionnaire->delete();
        return redirect()->route('dashboard')->with('success', 'Questionnaire deleted successfully!');
    }
}