<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GrowthStat;
use Illuminate\Http\Request;

class GrowthStatController extends Controller
{
    public function index()
    {
        $stats = GrowthStat::orderBy('sort_order')->get();

        return view('admin.growth-stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.growth-stats.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');

        GrowthStat::create($data);

        return redirect()->route('admin.growth-stats.index')->with('status', 'Stat added.');
    }

    public function edit(GrowthStat $growthStat)
    {
        return view('admin.growth-stats.edit', ['stat' => $growthStat]);
    }

    public function update(Request $request, GrowthStat $growthStat)
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');

        $growthStat->update($data);

        return redirect()->route('admin.growth-stats.index')->with('status', 'Stat updated.');
    }

    public function destroy(GrowthStat $growthStat)
    {
        $growthStat->delete();

        return back()->with('status', 'Stat deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'icon_class' => ['required', 'string', 'max:100'],
            'value' => ['required', 'integer', 'min:0'],
            'suffix' => ['nullable', 'string', 'max:10'],
            'is_active' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
