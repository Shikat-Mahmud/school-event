<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $batchs = range(2000, 2024);
        return view('frontend.main.review', compact('batchs'));
    }
}
