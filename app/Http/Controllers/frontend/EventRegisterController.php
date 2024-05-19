<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventRegisterController extends Controller
{
    public function index()
    {
        $batchs = range(2000, 2024);
        return view('frontend.main.event_register', compact('batchs'));
    }
}
