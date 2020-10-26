<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Tag;
use App\Models\Post;
use App\Traits\UploadTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
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
        if(Auth::user()->hasRole('Super Admin')) {
            $posts = Post::orderBy('created_at', 'DESC')->get();
        } else {
		    $posts = Post::where('author_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        }	    

		return view('admin.pages.posts.index', compact('posts'));
	}

	public function create()
	{
		$tags = Tag::all();

		return view('admin.pages.posts.create', compact('tags'));
	}

	public function store(PostRequest $request)
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
		$post = Post::create($input);

		return redirect()->route('posts.index')
			->with('success', 'Post created successfully');
	}

	public function show(Post $post, $slug)
	{
		$posts = Post::where('slug', $slug)->get();

		return view('front.pages.event', compact('posts'));
	}

	public function edit(Post $post)
	{
		return view('admin.pages.posts.edit', compact('post'));
	}

	public function update(PostRequest $request, Post $post)
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
		$post->update($input);

		return redirect()->route('posts.index')
			->with('success', 'Post updated successfully');
	}

	public function destroy(Post $post)
	{
		$post->delete();

		return redirect()->route('posts.index')
			->with('success', 'Post deleted successfully');
	}
}
