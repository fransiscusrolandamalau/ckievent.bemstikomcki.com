<?php

namespace App\Http\Controllers\Landing;

use Hash;
use App\Models\User;
use App\Models\Gallery;
use App\Mail\OrderShipped;
use App\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegistrationFrontRequest;
use App\Models\Event;

class BaseController extends Controller
{
    public function home()
    {
        return view('landing.pages.home', [
            'events' => Event::orderBy('created_at', 'DESC')->paginate(6),
            'popular_events' => Event::orderBy('created_at', 'DESC')->limit(3)->get(),
        ]);
    }

    public function eventDetail($slug)
    {
        $events = Event::where('slug', $slug)->first();

        return view('landing.pages.event-detail', compact('events'));
    }

    public function eventGallery()
    {
        $photos = Gallery::orderBy('created_at', 'DESC')->paginate(18);

        return view('landing.pages.gallery-event', compact('photos'))
                        ->with('i', (request()->input('page', 1) - 1) * 18);
    }

    public function eventRegistration($slug)
    {
        $events = Event::where('slug', $slug)->pluck('event_title', 'id');

        return view('landing.pages.registration-event', compact('events'));
    }

    public function eventRegistrationPost(RegistrationFrontRequest $request)
    {
        $input = $request->all();
        $input['event_id'] = $request->event_name;
        $input['name'] = $request->full_name;
        $input['email'] = $request->email;
        $input['password'] = Hash::make('12345678');
        $user = User::create($input);
        $user->assignRole($request->input('roles', 'Participants'));

        $registrations = Registration::create($input);
        $registrations->loadMissing('events');

        $registration = [
            'full_name' => $request->full_name,
            'email' => $request->email,
        ];

        Mail::to(request()->input('email'))
            ->send(new OrderShipped($registration));

        return redirect()->back()
            ->with('success', 'Thanks for your registration, please check your email address.');
    }
}
