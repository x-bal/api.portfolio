<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::get();

        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        $contact = new Contact();

        return view('contact.create', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'link' => 'required',
            'icon' => 'required',
        ]);

        try {
            Contact::create($request->all());

            return redirect()->route('contacts.index')->with('success', 'Your contact was created');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Contact $contact)
    {
    }

    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'link' => 'required',
            'icon' => 'required',
        ]);

        try {
            $contact->update($request->all());

            return redirect()->route('contacts.index')->with('success', 'Your contact was updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();

            return redirect()->route('contacts.index')->with('success', 'Your contact was deleted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
