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
            'start_time' => 'required',
            'end_time' => 'required',


        ];
    }
    public function messages()
    {
        return [
            'office.required' => "Office Field is required",
            'office.max' => "Office field can't me more that 250 characters",
            'candidates' => "Candidate field is required",
            'start_date.after' => "Start Date MUST be Today onward ",
            'end_date:after' => "End Date MUST be after the start date",

            'start_time.required' => "Start Time is Required",
            'end_time:required' => "End Time is Required",
        ];
    }
}
