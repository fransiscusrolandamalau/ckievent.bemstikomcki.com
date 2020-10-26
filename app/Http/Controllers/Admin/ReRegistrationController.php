<?php

namespace App\Http\Controllers\Admin;

use App\Models\Registration;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Auth;

class ReRegistrationController extends Controller
{
	use UploadTrait;

	public function index()
	{
        $registrations = Registration::where('email', '=', Auth::user()->email)->get();
        $registrations->loadMissing('posts');

		return view('admin.pages.re-registration.index', compact('registrations'));
	}

    public function paymentUpload(Registration $registration)
    {
        return view('admin.pages.re-registration.payment-upload', compact('registration'));
    }

    public function paymentUploadStore(Request $request, Registration $registration)
    {
		$input = $request->all();
		$image = $request->file('payment_upload');

		if ($image != '') {
			$name = Str::slug($request->input('full_name')) . '_' . time();
			$folder = '/payment_upload/';
			$filePath = $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);
			$input['payment_upload'] = $filePath;
		}
		$registration->update($input);

		return redirect()->route('re-registrations.index')
			->with('success', 'Payment uploaded successfully');
    }
}
