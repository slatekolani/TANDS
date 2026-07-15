<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesUploads;
use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    use ManagesUploads;

    public function index()
    {
        $images = GalleryImage::orderBy('sort_order')->paginate(24);

        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => ['required', 'image', 'max:5120'],
            'title' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:255'],
            'is_featured_home' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        GalleryImage::create([
            'image_path' => $this->uploadImage($request->file('image'), 'gallery'),
            'title' => $data['title'] ?? null,
            'caption' => $data['caption'] ?? null,
            'is_featured_home' => $request->boolean('is_featured_home'),
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.gallery.index')->with('status', 'Image added.');
    }

    public function edit(GalleryImage $gallery)
    {
        return view('admin.gallery.edit', ['image' => $gallery]);
    }

    public function update(Request $request, GalleryImage $gallery)
    {
        $data = $request->validate([
            'image' => ['nullable', 'image', 'max:5120'],
            'title' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:255'],
            'is_featured_home' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($gallery->image_path);
            $data['image_path'] = $this->uploadImage($request->file('image'), 'gallery');
        }
        unset($data['image']);

        $data['is_featured_home'] = $request->boolean('is_featured_home');

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('status', 'Image updated.');
    }

    public function destroy(GalleryImage $gallery)
    {
        $this->deleteImage($gallery->image_path);
        $gallery->delete();

        return back()->with('status', 'Image deleted.');
    }
}
