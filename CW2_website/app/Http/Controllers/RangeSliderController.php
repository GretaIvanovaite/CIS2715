<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Requests\SliderValueRequest;
Use App\Models\SliderValue;
Use App\Models\Question;
Use App\Models\Questionnaire;

class RangeSliderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Questionnaire $questionnaire, Question $question)
    {
        return view('questionnaires.questions.range.create', compact('questionnaire', 'question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Questionnaire $questionnaire, Question $question, SliderValue $range, SliderValueRequest $request)
    {
        SliderValue::create($request->validated());

        return redirect()->route('questionnaires.show', $questionnaire->id)->with('success', 'Range values created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire, Question $question, SliderValue $range)
    {
        return view('questionnaires.questions.range.edit', compact('questionnaire', 'question', 'range'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Questionnaire $questionnaire, Question $question, SliderValue $range, SliderValueRequest $request)
    {
        $range->update($request->validated());
        
        return redirect()->route('range.show', compact('questionnaire', 'question', 'range'))->with('success', 'Range values updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire, Question $question, SliderValue $range)
    {
        $range->delete();
        return redirect()->route('options.show', compact('questionnaire', 'question'))->with('success', 'Range values deleted successfully!');
    }
}
