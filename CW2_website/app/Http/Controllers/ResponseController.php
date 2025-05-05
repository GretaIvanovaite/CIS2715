<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Http\Requests\ResponseRequest;
Use App\Models\Response;
Use App\Models\Question;
Use App\Models\Questionnaire;

class ResponseController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Questionnaire $questionnaire)
    {
        return view('questionnaires.responses.show', compact('questionnaire'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Questionnaire $questionnaire, ResponseRequest $request)
    {
        Response::create($request->validated());

        return redirect()->route('questionnaires.show', $questionnaire->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire, Response $response)
    {
        $option->delete();
        return redirect()->route('cancel', $questionnaire->id)->with('success', 'Your response has been deleted successfully!');
    }
}
