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
     * Display the specified resource.
     */
    public function show(Questionnaire $questionnaire, Question $question)
    {
        return view('questionnaires.questions.questionOptions.show', compact('questionnaire', 'question'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Questionnaire $questionnaire, Question $question)
    {
        return view('questionnaires.questions.questionOptions.create', compact('questionnaire', 'question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Questionnaire $questionnaire, Question $question, QuestionOption $option, QuestionOptionRequest $request)
    {
        QuestionOption::create($request->validated());

        if ($request->again == 'Y')
            return view('questionnaires.questions.questionOptions.create', compact('questionnaire', 'question'))->with('success', 'Question option added successfully!');
        else
            return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Question option created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire, Question $question, QuestionOption $option)
    {
        return view('questionnaires.questions.questionOptions.edit', compact('questionnaire', 'question', 'option'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Questionnaire $questionnaire, Question $question, QuestionOption $option, QuestionOptionRequest $request)
    {
        $option->update($request->validated());
        
        return redirect()->route('options.show', compact('questionnaire', 'question', 'option'))->with('success', 'Question option updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire, Question $question, QuestionOption $option)
    {
        $option->delete();
        return redirect()->route('options.show', compact('questionnaire', 'question'))->with('success', 'Question option deleted successfully!');
    }
}
