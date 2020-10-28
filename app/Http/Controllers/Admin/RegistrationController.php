<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\Post;
use App\Models\User;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::orderBy('created_at', 'DESC')->get();

        return view('admin.pages.registration.index', compact('registrations'));
    }

    public function create()
    {
        $posts = Post::pluck('event_title', 'id');

        return view('admin.pages.registration.create', compact('posts'));
    }

    public function store(RegistrationRequest $request)
    {
        $input = $request->all();
        $input['event_id'] = $request->event_name;
        $input['name'] = $request->full_name;
        $input['email'] = $request->email;
        $input['password'] = Hash::make('12345678');
        $user = User::create($input);
        $user->assignRole($request->input('roles', 'Participants'));

        Registration::create($input);

        return redirect()->route('registrations.index')
            ->with('success', 'Has been created');
    }

    public function show(Registration $registration)
    {
        return view('admin.pages.registration.show', compact('registration'));
    }

    public function edit(Registration $registration)
    {
        $posts = Post::pluck('event_title', 'event_title');

        return view('admin.pages.registration.edit', compact('registration', 'posts'));
    }

    public function update(Request $request, Registration $registration)
    {
        $registration->update($request->all());

        return redirect()->route('registrations.index')
            ->with('success', 'Has been updated');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()->route('registrations.index')
            ->with('success', 'Has been deleted');
    }
}
