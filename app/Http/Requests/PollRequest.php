<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PollRequest extends FormRequest
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
            //
            'office' => 'required|max:250',
            'candidates' => 'required',
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date|after_or_equal:start_date',


        ];
    }
    public function messages()
    {
        return [
            'start_date.after' => "Start Date MUST be Today onward ",
            'end_date:after' => "End Date MUST be after the start date",
        ];
    }
}
