<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('sort_order')->get();

        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');

        Program::create($data);

        return redirect()->route('admin.programs.index')->with('status', 'Program added.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');

        $program->update($data);

        return redirect()->route('admin.programs.index')->with('status', 'Program updated.');
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return back()->with('status', 'Program deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon_class' => ['required', 'string', 'max:100'],
            'icon_color' => ['nullable', 'string', 'max:30'],
            'description' => ['nullable', 'string'],
            'is_active' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
