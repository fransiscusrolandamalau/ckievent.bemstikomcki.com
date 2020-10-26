<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilesRequest;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
	use UploadTrait;

	public function edit(Request $request)
	{
		$user = $request->user();

		return view('admin.pages.profiles.index', compact('user'));
	}

	public function update(Request $request, $id)
	{
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
		if (!empty($input['password'])) {
			$input['password'] = Hash::make($input['password']);
		} else {
			$input = Arr::except($input, ['password']);
		}

		$user = User::find($id);
		$user->update($input);

		return redirect()->back()->with('success', 'Updated successfully');
	}
}
