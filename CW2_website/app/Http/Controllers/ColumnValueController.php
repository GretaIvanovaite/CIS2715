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
    * Display the specified resource.
    */
    public function show(Questionnaire $questionnaire, Question $question)
    {
        return view('questionnaires.questions.columnValues.show', compact('questionnaire', 'question'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Questionnaire $questionnaire, Question $question)
    {
        return view('questionnaires.questions.columnValues.create', compact('questionnaire', 'question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Questionnaire $questionnaire, Question $question, ColumnValue $column, ColumnValueRequest $request)
    {
        ColumnValue::create($request->validated());

        if ($request->again == 'Y')
            return view('questionnaires.questions.columnValues.create', compact('questionnaire', 'question'))->with('success', 'Column value added successfully!');
        else
            return view('questionnaires.questions.questionOptions.create', compact('questionnaire', 'question'))->with('success', 'Column values created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire, Question $question, ColumnValue $column)
    {
        return view('questionnaires.questions.columnValues.edit', compact('questionnaire', 'question', 'column'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Questionnaire $questionnaire, Question $question, ColumnValue $column, ColumnValueRequest $request)
    {
        $column->update($request->validated());

        return redirect()->route('columns.show', compact('questionnaire', 'question', 'column'))->with('success', 'Column value updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire, Question $question, ColumnValue $column)
    {
        $column->delete();
        return redirect()->route('columns.show', compact('questionnaire', 'question'))->with('success', 'Column value deleted successfully!');
    }
}

