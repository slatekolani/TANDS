<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesUploads;
use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;

class HeroSlideController extends Controller
{
    use ManagesUploads;

    public function index()
    {
        $slides = HeroSlide::orderBy('sort_order')->get();

        return view('admin.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.hero-slides.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        HeroSlide::create([
            'image_path' => $this->uploadImage($request->file('image'), 'hero'),
            'caption' => $data['caption'] ?? null,
            'description' => $data['description'] ?? null,
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.hero-slides.index')->with('status', 'Slide added.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero-slides.edit', ['slide' => $heroSlide]);
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $data = $this->validated($request, true);

        if ($request->hasFile('image')) {
            $this->deleteImage($heroSlide->image_path);
            $data['image_path'] = $this->uploadImage($request->file('image'), 'hero');
        }
        unset($data['image']);

        $data['is_active'] = $request->boolean('is_active');

        $heroSlide->update($data);

        return redirect()->route('admin.hero-slides.index')->with('status', 'Slide updated.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $this->deleteImage($heroSlide->image_path);
        $heroSlide->delete();

        return back()->with('status', 'Slide deleted.');
    }

    private function validated(Request $request, bool $imageOptional = false): array
    {
        return $request->validate([
            'image' => [$imageOptional ? 'nullable' : 'required', 'image', 'max:5120'],
            'caption' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'is_active' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
