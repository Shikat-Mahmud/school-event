<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getEventDate()
    {
        $event = Event::first();
        return response()->json(['date' => $event->date]);
    }

    public function index()
    {
        $events = Event::all();
        return view('admin.main.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.main.event.create');
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'datetime' => 'required|date',
    ]);

    $event = new Event();
    $event->name = $request->name;
    $event->datetime = $request->datetime;
    $event->save();

    return redirect()->back()->with('success', 'Event created successfully.');
}

}
