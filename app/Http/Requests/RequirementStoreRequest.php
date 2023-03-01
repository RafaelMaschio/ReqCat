<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequirementStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'requirement_types_id' => 'required|integer',
            'project_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
        ];
    }
}
