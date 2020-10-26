<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;

class TagController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = Tag::latest()->get();

			return Datatables::of($data)
					->addIndexColumn()
					->addColumn('action', function ($row) {
						$btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm edit">Edit</a>';
						$btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete">Delete</a>';

						return $btn;
					})
					->rawColumns(['action'])
					->make(true);
		}

		return view('admin.pages.tags.index');
	}

	public function store(Request $request)
	{
		Tag::updateOrCreate(
			['id' => $request->id],
			[
				'title' => $request->title,
				'slug' => Str::slug($request->title),
			]
		);

		return response()->json(['success' => 'Tag saved successfully']);
	}

	public function edit($id)
	{
		$tag = Tag::find($id);

		return response()->json($tag);
	}

	public function destroy($id)
	{
		Tag::find($id)->delete();

		return response()->json(['success', 'Tag deleted successfully']);
	}
}
