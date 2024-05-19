<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('frontend.main.team', compact('teams'));
    }

    public function teamList()
    {
        $teams = Team::all();
        return view('admin.main.team.index', compact('teams'));
    }
}
