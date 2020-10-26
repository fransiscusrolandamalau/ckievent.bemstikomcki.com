<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
	public function dashboard()
	{
		$posts = Post::select(DB::raw('COUNT(*) as count'))
			->whereYear('created_at', date('Y'))
			->groupBy(DB::raw('Month(created_at)'))
			->pluck('count');

		return view('admin.pages.dashboard', compact('posts'));
	}
}
