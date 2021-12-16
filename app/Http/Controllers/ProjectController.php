<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();

        return view('project.index', compact('projects'));
    }

    public function create()
    {
        $tags = Tag::get();
        $project = new Project();

        return view('project.create', compact('tags', 'project'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'thumbnail' => 'mimes:png, jpg, jpeg, svg, gif',
        ]);

        try {
            if ($request->file('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailUrl = $thumbnail->storeAs('projects', Str::slug($request->name) . '.' . $thumbnail->extension());
            } else {
                $thumbnailUrl = 'projects/coming-soon.png';
            }

            $project = Project::create([
                'name' => $request->name,
                'description' => $request->description,
                'link' => $request->link,
                'thumbnail' => $thumbnailUrl,
            ]);

            $project->tags()->attach($request->tags);

            return redirect()->route('projects.index')->with('success', 'Your project was created');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {

        $tags = Tag::get();

        return view('project.edit', compact('tags', 'project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'thumbnail' => 'mimes:png, jpg, jpeg, svg, gif',
        ]);

        try {
            if ($request->file('thumbnail')) {
                Storage::delete($project->thumbnail);
                $thumbnail = $request->file('thumbnail');
                $thumbnailUrl = $thumbnail->storeAs('projects', Str::slug($request->name) . '.' . $thumbnail->extension());
            } else {
                $thumbnailUrl = $project->thumbnail;
            }

            $project->update([
                'name' => $request->name,
                'description' => $request->description,
                'link' => $request->link,
                'thumbnail' => $thumbnailUrl,
            ]);

            $project->tags()->sync($request->tags);

            return redirect()->route('projects.index')->with('success', 'Your project was updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Project $project)
    {
        try {
            Storage::delete($project->thumbnail);
            $project->tags()->detach();
            $project->delete();

            return redirect()->route('projects.index')->with('success', 'Your project was deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
