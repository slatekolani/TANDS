<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesUploads;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventSection;
use Illuminate\Http\Request;

class EventSectionController extends Controller
{
    use ManagesUploads;

    public function store(Request $request, Event $event)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->uploadImage($request->file('image'), 'events/sections');
        }

        $event->sections()->create($data);

        return back()->with('status', 'Section added.');
    }

    public function update(Request $request, Event $event, EventSection $section)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $this->deleteImage($section->image_path);
            $data['image_path'] = $this->uploadImage($request->file('image'), 'events/sections');
        }

        if ($request->boolean('remove_image')) {
            $this->deleteImage($section->image_path);
            $data['image_path'] = null;
        }

        $section->update($data);

        return back()->with('status', 'Section updated.');
    }

    public function destroy(Event $event, EventSection $section)
    {
        $this->deleteImage($section->image_path);
        $section->delete();

        return back()->with('status', 'Section removed.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
