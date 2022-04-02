<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::get();

        return view('profile.index', compact('profiles'));
    }

    public function create()
    {
        $profile = new Profile();

        return view('profile.create', compact('profile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'role' => 'required',
            'about' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,gif',
        ]);

        try {
            $image = $request->file('image');
            $imageUrl = $image->storeAs('profile', Str::slug($request->full_name) . '.' . $image->extension());

            Profile::create([
                'full_name' => $request->full_name,
                'role' => $request->role,
                'about' => $request->about,
                'image' => $imageUrl,
            ]);

            return redirect()->route('profile.index')->with('success', 'Your profile was created');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Profile $profile)
    {
        //
    }

    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'full_name' => 'required',
            'role' => 'required',
            'about' => 'required',
            'image.*' => 'mimes:png,jpg,jpeg,svg,gif',
        ]);

        try {
            if ($request->file('image')) {
                Storage::delete($profile->image);
                $image = $request->file('image');
                $imageUrl = $image->storeAs('profile', Str::slug($request->full_name) . '.' . $image->extension());
            } else {
                $imageUrl = $profile->image;
            }

            $profile->update([
                'full_name' => $request->full_name,
                'role' => $request->role,
                'about' => $request->about,
                'image' => $imageUrl,
            ]);

            return redirect()->route('profile.index')->with('success', 'Your profile was updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Profile $profile)
    {
        //
    }
}
