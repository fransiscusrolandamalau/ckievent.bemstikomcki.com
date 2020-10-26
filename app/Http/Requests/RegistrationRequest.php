<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
			'full_name' => 'required',
			'email' => 'required|email|max:255|unique:registrations,email',
			'phone_number' => 'required|numeric',
			'event_name' => 'required',
			'status' => '',
			'instansi' => '',
			'nim' => 'numeric',
			'kelas' => '',
			'semester' => '',
			'info' => 'required',
			'payment_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		];
	}
}
