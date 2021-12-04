<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::get();

        return view('tag.index', compact('tags'));
    }

    public function create()
    {
        $tag = new Tag();

        return view('tag.create', compact('tag'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        try {
            Tag::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            return redirect()->route('tags.index')->with('success', 'Your tag was created');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }


    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required']);

        try {
            $tag->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            return redirect()->route('tags.index')->with('success', 'Your tag was updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Tag $tag)
    {
        try {
            $tag->projects()->detach();
            $tag->delete();

            return redirect()->route('tags.index')->with('success', 'Your tag was deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
