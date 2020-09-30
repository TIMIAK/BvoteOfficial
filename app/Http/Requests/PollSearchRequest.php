<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PollSearchRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'voteid' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'voteid.required' => 'The Vote ID is Required',
        ];
    }
}
