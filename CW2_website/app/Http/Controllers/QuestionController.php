<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Requests\QuestionRequest;
Use App\Models\Question;
Use App\Models\Questionnaire;

class QuestionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Questionnaire $questionnaire)
    {
        return view('questions.create', compact('questionnaire'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        Question::create($request->validated());

        return redirect()->route('questionnaires.show', $request->questionnaire_id)->with('success', 'Question created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->validated());
        return redirect()->route('questionnaires.show', $request->questionnaire_id)->with('success', 'Question details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $questionnaire = $question->questionnaire_id;
        $question->delete();
        return redirect()->route('questionnaires.show', $questionnaire)->with('success', 'Question deleted successfully!');
    }
}
