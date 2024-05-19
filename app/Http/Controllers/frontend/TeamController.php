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

    public function create()
    {
        return view('admin.main.team.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $team = new Team();
            $team->name = $request->name;
            $team->role = $request->role;
            if ($request->hasFile('photo')) {
                $team->photo = $request->file('photo')->store('teams', 'public');
            }
            $team->save();

            return redirect()->route('team.list')->with('success', 'Team member created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
