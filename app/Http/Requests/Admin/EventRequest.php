<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'event_title' => 'required|max:20|min:5',
            'excerpt' => 'nullable|min:10|string',
            'location' => 'required',
            'event_start' => 'required',
            'start_time' => 'required',
            'event_ends' => 'required',
            'end_time' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|min:5',
            'terms_and_conditions' => 'nullable|min:5',
            'contact_person' => 'required|numeric',
            'path_to' => 'required|url',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
        ];
    }
}
