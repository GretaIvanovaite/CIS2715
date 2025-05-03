<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Requests\ColumnValueRequest;
Use App\Models\ColumnValue;
Use App\Models\Question;
Use App\Models\Questionnaire;

class ColumnValueController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Questionnaire $questionnaire, Question $question)
    {
        return view('questionnaires.questions.columns.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Questionnaire $questionnaire, Question $question, ColumnValue $column, ColumnValueRequest $request)
    {
        ColumnValue::create($request->validated());

        return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Question column created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire, Question $question, ColumnValue $column)
    {
        return view('questionnaires.questions.columns.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Questionnaire $questionnaire, Question $question, ColumnValue $column, ColumnValueRequest $request)
    {
        $column->update($request->validated());
        return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Question column updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire, Question $question, ColumnValue $column)
    {
        $column->delete();
        return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Question column deleted successfully!');
    }
}

