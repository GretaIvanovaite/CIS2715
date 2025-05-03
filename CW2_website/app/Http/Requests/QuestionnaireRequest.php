<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionnaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $acceptedStatus = ['In development', 'Live', 'Closed'];
        if ($this->isMethod('PATCH')) {
            $rules = [
                'description' => 'nullable|string',
                'status' => ['required', 'string', Rule::in($acceptedStatus)],
            ];
    
            if ($this->has('title')) {
                $questionnaireId = $this->route('questionnaire')->id ?? null;
                $rules['title'] = [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('questionnaires')->ignore($questionnaireId),
                ];
            }
            return $rules;
        }

        return [
            'title' => 'unique:questionnaires|required|string|max:255',
            'description' => 'nullable|string',
            'status' => ['required', 'string', Rule::in($acceptedStatus)],
            'user_id' => 'required|integer',
        ];
    }
}
