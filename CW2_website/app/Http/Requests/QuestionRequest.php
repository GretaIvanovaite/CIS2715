<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
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
        $acceptedTypes = ['Short-text', 'Long-text', 'Tick-one', 'Tick-many', 'Grid', 'Range'];
        if ($this->isMethod('PATCH')) {
            return [
                'text' => 'required|string|max:255',
                'required' => 'nullable|required|string|max:255',
            ];
        }
        return [
            'text' => 'required|string|max:255',
            'type' => ['required', Rule::in($acceptedTypes)],
            'required' => 'nullable|required|string|max:255',
            'questionnaire_id' => 'required|integer',
        ];
    }
}
