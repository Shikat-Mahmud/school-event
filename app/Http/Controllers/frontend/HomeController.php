<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventSchedule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $event = Event::first();
        $event_schedule = EventSchedule::where('event_id', 1)->get();
        return view('frontend.main.home', compact('event', 'event_schedule'));
    }
}
