<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesUploads;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventGalleryImage;
use Illuminate\Http\Request;

class EventGalleryImageController extends Controller
{
    use ManagesUploads;

    public function store(Request $request, Event $event)
    {
        $data = $request->validate([
            'image' => ['required', 'image', 'max:5120'],
            'caption' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $event->galleryImages()->create([
            'image_path' => $this->uploadImage($request->file('image'), 'events/gallery'),
            'caption' => $data['caption'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return back()->with('status', 'Gallery image added.');
    }

    public function update(Request $request, Event $event, EventGalleryImage $image)
    {
        $data = $request->validate([
            'image' => ['nullable', 'image', 'max:5120'],
            'caption' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($image->image_path);
            $data['image_path'] = $this->uploadImage($request->file('image'), 'events/gallery');
        }

        unset($data['image']);
        $image->update($data);

        return back()->with('status', 'Gallery image updated.');
    }

    public function destroy(Event $event, EventGalleryImage $image)
    {
        $this->deleteImage($image->image_path);
        $image->delete();

        return back()->with('status', 'Gallery image removed.');
    }
}
