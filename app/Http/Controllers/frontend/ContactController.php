<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Event;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settings = generalSettings();
        $event = Event::first();
        return view('frontend.main.contact', compact('settings', 'event'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'nullable|email',
                'message' => 'required|string',
            ]);

            $inputs = $request->all();
            $contact = new Contact();
            $contact->fill($inputs);
            $contact->save();

            return redirect()->back()->with('success', 'Contact form submitted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
