<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $event = Event::first();
        return view('frontend.main.home', compact('event'));
    }
}
