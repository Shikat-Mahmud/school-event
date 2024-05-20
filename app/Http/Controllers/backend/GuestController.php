<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('admin.main.guest.index', compact('guests'));
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

            $team = new Guest();
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


    public function edit(string $id)
    {
        $team = Guest::find($id);
        return view('admin.main.team.edit', compact('team'));
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $team = Guest::findOrFail($id);

            $team->name = $request->input('name');
            $team->role = $request->input('role');
            if ($request->hasFile('photo')) {
                // Delete old image if it exists
                if ($team->photo) {
                    Storage::delete('public/' . $team->photo);
                }
                // Store the new image
                $team->photo = $request->file('photo')->store('teams', 'public');
            }

            $team->save();

            return redirect()->route('team.list')->with('success', 'Team member updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $team = Guest::find($id);
        // Delete the image if it exists
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }
        $team->delete();

        return redirect()->route('team.list')->with('success', 'Team member deleted successfully.');
    }
}
