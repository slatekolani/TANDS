<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesUploads;
use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    use ManagesUploads;

    public function index()
    {
        $members = TeamMember::orderBy('sort_order')->get();

        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $this->uploadImage($request->file('photo'), 'team');
        }
        unset($data['photo']);
        $data['is_active'] = $request->boolean('is_active');

        TeamMember::create($data);

        return redirect()->route('admin.team.index')->with('status', 'Team member added.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            $this->deleteImage($team->photo_path);
            $data['photo_path'] = $this->uploadImage($request->file('photo'), 'team');
        }
        unset($data['photo']);
        $data['is_active'] = $request->boolean('is_active');

        $team->update($data);

        return redirect()->route('admin.team.index')->with('status', 'Team member updated.');
    }

    public function destroy(TeamMember $team)
    {
        $this->deleteImage($team->photo_path);
        $team->delete();

        return back()->with('status', 'Team member deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role_title' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:5120'],
            'bio' => ['nullable', 'string'],
            'is_active' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
