<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesUploads;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    use ManagesUploads;

    public function index()
    {
        $partners = Partner::orderBy('sort_order')->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('logo')) {
            $data['logo_path'] = $this->uploadImage($request->file('logo'), 'partners');
        }
        unset($data['logo']);
        $data['is_active'] = $request->boolean('is_active');

        Partner::create($data);

        return redirect()->route('admin.partners.index')->with('status', 'Partner added.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $this->validated($request);

        if ($request->hasFile('logo')) {
            $this->deleteImage($partner->logo_path);
            $data['logo_path'] = $this->uploadImage($request->file('logo'), 'partners');
        }
        unset($data['logo']);
        $data['is_active'] = $request->boolean('is_active');

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('status', 'Partner updated.');
    }

    public function destroy(Partner $partner)
    {
        $this->deleteImage($partner->logo_path);
        $partner->delete();

        return back()->with('status', 'Partner deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'max:5120'],
            'description' => ['nullable', 'string'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'is_active' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
