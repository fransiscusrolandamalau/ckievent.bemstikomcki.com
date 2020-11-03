<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function dashboard()
    {
        $posts = Event::select(DB::raw('COUNT(*) as count'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('count');

        return view('admin.pages.dashboard', compact('posts'));
    }
}
