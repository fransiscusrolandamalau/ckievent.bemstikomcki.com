<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationFrontRequest;
use App\Mail\OrderShipped;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\User;
use App\Models\Registration;
use Hash;
use Illuminate\Support\Facades\Mail;

class BaseController extends Controller
{
	public function home()
	{
		$posts = Post::where('is_published', true)->orderBy('created_at', 'DESC')->paginate(6);

		return view('front.pages.home', compact('posts'));
	}

	public function event()
	{
		$posts = Post::where('is_published', true)->orderBy('event_start', 'DESC')->paginate(9);

		return view('front.pages.event', compact('posts'))
			->with('i', (request()->input('page', 1) - 1) * 9);
	}

	public function eventDetail($slug)
	{
		$posts = Post::where('slug', $slug)->get();

		return view('front.pages.event-detail', compact('posts'));
	}

	public function contact()
	{
		return view('front.pages.contact');
    }

    public function eventGallery()
    {
        $photos = Gallery::orderBy('created_at', 'DESC')->paginate(18);

        return view('front.pages.gallery-event', compact('photos'))
                        ->with('i', (request()->input('page', 1) - 1) * 18);
    }

	public function aboutUs()
	{
		return view('front.pages.about-us');
	}

	public function eventRegistration($slug)
	{
		$posts = Post::where('slug', $slug)->pluck('event_title', 'id');

		return view('front.pages.registration-event', compact('posts'));
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
		$registrations->loadMissing('posts');

		$registration = [
			'full_name' => $request->full_name,
			'email' => $request->email,
		];

		Mail::to(request()->input('email'))
			->send(new OrderShipped($registration));

		return redirect()->back()
			->with('success', 'Thanks for your registration, please check your email address.');
	}

	public function error()
	{
		return view('front.errors.404');
	}
}
