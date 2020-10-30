<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Tag;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Category;
use App\Models\Event;

class EventController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['delete', 'destroy']]);
    }

    public function index()
    {
        if (Auth::user()->hasRole('Super Admin')) {
            $events = Event::orderBy('created_at', 'DESC')->get();
        } else {
            $events = Event::where('author_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        }

        return view('admin.pages.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.pages.events.create', [
            'events' => new Event(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function store(EventRequest $request)
    {
        $input = $request->all();

        $input['slug'] = Str::slug($input['event_title']);
        $input['author_id'] = $request->user()->id;
        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/thumbnail/';
            $filePath = $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $input['thumbnail'] = $filePath;
        }
        Event::create($input);

        return redirect()->route('events.index')
            ->with('success', 'Event created successfully');
    }

    public function show(Event $event, $slug)
    {
        $event = Event::where('slug', $slug)->get();

        return view('front.pages.event', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.pages.events.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $input = $request->all();

        $image_name = $request->hidden_image;
        $image = $request->file('thumbnail');
        if ($image != '') {
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/thumbnail/';
            $filePath = $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $input['thumbnail'] = $filePath;
        }
        $event->update($input);

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully');
    }
}
