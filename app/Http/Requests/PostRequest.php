<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
			'event_title' => 'required|max:75',
			'location' => 'required',
			'event_start' => 'required',
			'start_time' => 'required',
			'event_ends' => 'required',
			'end_time' => 'required',
			'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'content' => 'required',
			'contact' => 'required',
			'is_published' => 'required',
		];
	}
}
