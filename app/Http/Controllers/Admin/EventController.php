<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;

class EventController extends Controller
{
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
        ]);
    }

    public function store(EventRequest $request)
    {
        $attr = $request->all();

        $attr['slug'] = Str::slug(request('event_title')) . '-' . dechex(time());
        $attr['meta_title'] = request('event_title');
        $attr['meta_description'] = Str::limit(strip_tags(request('description')), 139);

        $thumbnail = request()->file('thumbnail');
        $filename = $thumbnail->getClientOriginalName();
        $thumbnailName = safe_file_name(pathinfo($filename, PATHINFO_FILENAME)) . '-' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
        if ($thumbnail) {
            $thumbnailUrl = $thumbnail->storeAs('event/thumbnails', $thumbnailName);
        } else {
            $thumbnailUrl = null;
        }

        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnailUrl;

        auth()->user()->event()->create($attr);

        return redirect()->route('events.index')
            ->with('success', 'Event has been created successfully');
    }

    public function show(Event $event, $slug)
    {
        $event = Event::where('slug', $slug)->get();

        return view('front.pages.event', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.pages.events.edit', [
            'events' => $event,
            'categories' => Category::get(),
        ]);
    }

    public function update(EventRequest $request, Event $event)
    {
        $attr = $request->all();

        $hidden_thumbnail = request('hidden_thumbnail');
        $thumbnail = request()->file('thumbnail');
        $filename = $thumbnail->getClientOriginalName();
        $thumbnailName = safe_file_name(pathinfo($filename, PATHINFO_FILENAME)) . '-' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();
        if ($thumbnail) {
            \Storage::delete($event->thumbnail);
            $thumbnailUrl = $thumbnail->storeAs('event/thumbnails', $thumbnailName);
        } else {
            $thumbnailUrl = $hidden_thumbnail;
        }

        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnailUrl;

        $event->update($attr);

        return redirect()->route('events.index')
            ->with('success', 'Event has been updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully');
    }
}
