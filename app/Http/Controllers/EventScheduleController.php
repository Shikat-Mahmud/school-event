<?php

namespace App\Http\Controllers;

use App\Models\EventSchedule;
use Illuminate\Http\Request;

class EventScheduleController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->hasAnyPermission(['create-event-schedule', 'edit-event-schedule', 'show-event-schedule', 'delete-event-schedule',])) {
            $event_schedule = EventSchedule::all();
            return view('admin.main.event_schedule.index', compact('event_schedule'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to events schedule.');
        }
    }
}
