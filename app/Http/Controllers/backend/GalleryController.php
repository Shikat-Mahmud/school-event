<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('frontend.main.gallery', compact('galleries'));
    }

    public function galleryList()
    {
        $galleries = Gallery::all();
        return view('admin.main.gallery.index', compact('galleries'));
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

            $team = new Gallery();
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

    public function destroy($id)
    {
        $team = Gallery::find($id);
        // Delete the image if it exists
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }
        $team->delete();

        return redirect()->route('team.list')->with('success', 'Team member deleted successfully.');
    }
}
