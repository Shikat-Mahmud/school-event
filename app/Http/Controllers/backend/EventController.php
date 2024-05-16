<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getEventDate()
    {
        $event = Event::first(); // Fetch the event (adjust the query as needed)
        return response()->json(['datetime' => $event->datetime]);
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

    public function edit(string $id)
    {
        $event = Event::find($id);
        return view('admin.main.event.edit', compact('event'));
    }


    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'datetime' => 'required|date',
            ]);
            $event = Event::find($id);

            $event->update([
                'name' => $request->input('name'),
                'datetime' => $request->input('datetime')
            ]);

            return redirect()->route('events')->with('success', 'Event updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        Event::find($id)->delete();
        return redirect()->back()->with('success', 'Event deleted successfully.');
    }

}
