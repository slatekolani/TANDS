<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesUploads;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    use ManagesUploads;

    public function index()
    {
        $activities = Activity::orderBy('sort_order')->get();

        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.activities.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image_1')) {
            $data['image_path_1'] = $this->uploadImage($request->file('image_1'), 'activities');
        }
        if ($request->hasFile('image_2')) {
            $data['image_path_2'] = $this->uploadImage($request->file('image_2'), 'activities');
        }
        unset($data['image_1'], $data['image_2']);
        $data['is_active'] = $request->boolean('is_active');

        Activity::create($data);

        return redirect()->route('admin.activities.index')->with('status', 'Activity added.');
    }

    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image_1')) {
            $this->deleteImage($activity->image_path_1);
            $data['image_path_1'] = $this->uploadImage($request->file('image_1'), 'activities');
        }
        if ($request->hasFile('image_2')) {
            $this->deleteImage($activity->image_path_2);
            $data['image_path_2'] = $this->uploadImage($request->file('image_2'), 'activities');
        }
        unset($data['image_1'], $data['image_2']);
        $data['is_active'] = $request->boolean('is_active');

        $activity->update($data);

        return redirect()->route('admin.activities.index')->with('status', 'Activity updated.');
    }

    public function destroy(Activity $activity)
    {
        $this->deleteImage($activity->image_path_1);
        $this->deleteImage($activity->image_path_2);
        $activity->delete();

        return back()->with('status', 'Activity deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image_1' => ['nullable', 'image', 'max:5120'],
            'image_2' => ['nullable', 'image', 'max:5120'],
            'is_active' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
