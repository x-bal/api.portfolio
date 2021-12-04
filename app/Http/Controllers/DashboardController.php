<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Tag;
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
}
