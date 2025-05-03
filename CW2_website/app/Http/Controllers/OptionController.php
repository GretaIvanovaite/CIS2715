<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Requests\QuestionOptionRequest;
Use App\Models\QuestionOption;
Use App\Models\Question;
Use App\Models\Questionnaire;

class OptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Questionnaire $questionnaire, Question $question)
    {
        return view('questionnaires.questions.questionOptions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Questionnaire $questionnaire, Question $question, QuestionOption $option, QuestionOptionRequest $request)
    {
        QuestionOption::create($request->validated());

        return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Question option created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire, Question $question, QuestionOption $option)
    {
        return view('questionnaires.questions.options.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Questionnaire $questionnaire, Question $question, QuestionOption $option, QuestionOptionRequest $request)
    {
        $option->update($request->validated());
        return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Question option updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire, Question $question, QuestionOption $option)
    {
        $option->delete();
        return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Question option deleted successfully!');
    }
}
