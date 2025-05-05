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
        return view('questionnaires.questions.create', compact('questionnaire'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Questionnaire $questionnaire, QuestionRequest $request)
    {
        $question = Question::create($request->validated());

        if ($request->type == 'Short-text' || $request->type == 'Long-text')
            return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Question created successfully!');
        elseif ($request->type == 'Grid')
            return redirect()->route('columns.create', compact('questionnaire', 'question'))->with('success', 'Question created successfully!');
        elseif ($request->type == 'Range')
            return redirect()->route('range.create', compact('questionnaire', 'question'))->with('success', 'Question created successfully!');
        else
            return redirect()->route('options.create', compact('questionnaire', 'question'))->with('success', 'Question created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire, Question $question)
    {
        return view('questionnaires.questions.edit', compact(['questionnaire', 'question']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Questionnaire $questionnaire, Question $question, QuestionRequest $request)
    {
        $question->update($request->validated());
        return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Question details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->delete();
        return redirect()->route('questionnaires.show', $questionnaire)->with('success', 'Question deleted successfully!');
    }
}
