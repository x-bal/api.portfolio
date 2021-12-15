<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $project = Project::count();
        $skill = Skill::count();
        $contact = Contact::count();
        $tag = Tag::count();

        return view('dashboard.index', compact('project', 'skill', 'contact', 'tag'));
    }

    public function profile()
    {
        $user = User::find(auth()->user()->id);

        return view('dashboard.profile', compact('user'));
    }

    public function updateProfile(User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $attr = request()->all();

        if (request('password') != NULL) {
            $attr['password'] = bcrypt(request('password'));
        } else {
            $attr['password'] = auth()->user()->getAuthPassword();
        }

        $user->update($attr);

        return back()->with('success', 'Your profile was updated');
    }
}
