<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Requests\QuestionOptionRequest;
Use App\Models\QuestionOption;
Use App\Models\Question;

class OptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Question $question)
    {
        return view('questionOptions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionOptionRequest $request)
    {
        QuestionOption::create($request->validated());

        return redirect()->route('questionnaires.show', $request->question->questionnaire_id)->with('success', 'Question option created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return view('options.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionOptionRequest $request, QuestionOption $option)
    {
        $option->update($request->validated());
        return redirect()->route('questionnaires.show', $option->question->questionnaire_id)->with('success', 'Question option updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionOption $option)
    {
        $option = $option->question_id;
        $option->delete();
        return redirect()->route('questionnaires.show', $option->question->questionnaire_id)->with('success', 'Question option deleted successfully!');
    }
}
