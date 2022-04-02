<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::get();

        return view('skill.index', compact('skills'));
    }

    public function create()
    {
        $skill = new Skill();

        return view('skill.create', compact('skill'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'experience' => 'required',
            'logo' => 'required',
            'logo' => 'mimes:jpg,jpeg,png,svg,gif',
        ]);

        try {
            $logo = $request->file('logo');
            $logoUrl = $logo->storeAs('skill', Str::slug($request->name) . '.' . $logo->extension());

            Skill::create([
                'name' => $request->name,
                'experience' => $request->experience,
                'logo' => $logoUrl,
            ]);

            return redirect()->route('skills.index')->with('success', 'Your skill was created');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Skill $skill)
    {
        //
    }

    public function edit(Skill $skill)
    {
        return view('skill.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required',
            'experience' => 'required',
            'logo' => 'required',
            'logo.*' => 'mimes:jpg,jpeg,png,svg,gif',
        ]);

        try {
            if ($request->file('logo')) {
                Storage::delete($skill->logo);
                $logo = $request->file('logo');
                $logoUrl = $logo->storeAs('skill', Str::slug($request->name) . '.' . $logo->extension());
            } else {
                $logoUrl = $skill->logo;
            }

            $skill->update([
                'name' => $request->name,
                'experience' => $request->experience,
                'logo' => $logoUrl,
            ]);

            return redirect()->route('skills.index')->with('success', 'Your skill was updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Skill $skill)
    {
        try {
            Storage::delete($skill->logo);
            $skill->delete();

            return redirect()->route('skills.index')->with('success', 'Your skill was deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
