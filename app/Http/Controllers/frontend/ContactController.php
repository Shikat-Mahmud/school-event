<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $settings = generalSettings();
        $event = Event::first();
        return view('frontend.main.contact', compact('settings', 'event'));
    }
}
