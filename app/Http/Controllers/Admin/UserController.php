<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UserController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index', 'store']]);
		$this->middleware('permission:users-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:users-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:users-delete', ['only' => ['create', 'destroy']]);
	}

	public function index(Request $request)
	{
		$data = User::orderBy('id', 'DESC')->get();

		return view('admin.pages.users.index', compact('data'));
	}

	public function create()
	{
		$roles = Role::pluck('name', 'name')->all();

		return view('admin.pages.users.create', compact('roles'));
	}

	public function store(UserRequest $request)
	{
		$input = $request->all();
		$input['password'] = Hash::make($input['password']);
		if ($request->has('avatar')) {
			$image = $request->file('avatar');
			$name = Str::slug($request->input('name')) . '_' . time();
			$folder = '/avatar/';
			$filePath = $name . '.' . $image->getClientOriginalExtension();
			$this->uploadOne($image, $folder, 'public', $name);
			$input['avatar'] = $filePath;
		}
		$user = User::create($input);
		$user->assignRole($request->input('roles', 'Participants'));

		return redirect()->route('users.index')->with('success', 'User created successfully');
	}

	public function show($id)
	{
		$user = User::find($id);

		return view('admin.pages.users.show', compact('user'));
	}

	public function edit($id)
	{
		$user = User::find($id);
		$roles = Role::pluck('name', 'name')->all();
		$userRole = $user->roles->pluck('name', 'name')->all();

		return view('admin.pages.users.edit', compact('user', 'roles', 'userRole'));
	}

	public function update(UserRequest $request, $id)
	{
		$input = $request->all();
		if (!empty($input['password'])) {
			$input['password'] = Hash::make($input['password']);
		} else {
			$input = Arr::except($input, ['password']);
		}

		$user = User::find($id);
		$user->update($input);
		DB::table('model_has_roles')->where('model_id', $id)->delete();

		$user->assignRole($request->input('roles'));

		return redirect()->route('users.index')->with('success', 'User updated successfully');
	}

	public function destroy($id)
	{
		User::find($id)->delete();

		return redirect()->route('users.index')->with('success', 'User deleted successfully');
	}
}
