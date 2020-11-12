<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    private $photo_path;

    public function __construct()
    {
        $this->photo_path = public_path('/gallery');
    }

    public function index()
    {
        $photos = Gallery::all();

        return view('admin.pages.gallery.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.pages.gallery.create');
    }

    public function store(Request $request)
    {
        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }
        if (!is_dir($this->photo_path)) {
            mkdir($this->photo_path, 0777);
        }
        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . Str::random(30));
            $save_name = $name . '.' . $photo->getClientOriginalExtension();
            $resize_name = $name . Str::random(2) . '.' . $photo->getClientOriginalExtension();

            Image::make($photo)->resize(250, null, function ($constraints) {
                $constraints->aspectRatio();
            })->save($this->photo_path . '/' . $resize_name);

            $photo->move($this->photo_path, $save_name);
            $gallery = new Gallery();
            $gallery->filename = $save_name;
            $gallery->resized_name = $resize_name;
            $gallery->original_name = basename($photo->getClientOriginalName());
            $gallery->save();
        }

        return Response::json([
            'message' => 'Image saved successfully',
        ], 200);
    }

    public function show(Gallery $gallery)
    {
        //
    }

    public function edit(Gallery $gallery)
    {
        //
    }

    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    public function destroy(Request $request)
    {
        $filename = $request->id;
        $uploaded_image = Gallery::where('original_name', basename($filename))->first();

        if (empty($uploaded_image)) {
            return response()->json('message', 400);
        }
        $file_path = $this->photo_path . '/' . $uploaded_image->filename;
        $resized_file = $this->photo_path . '/' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        if (file_exists($resized_file)) {
            unlink($resized_file);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['message' => 'File successfully delete'], 200);
    }

    public function delete($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();

        return redirect()->back()->with('success', 'Contact deleted!');
    }
}
