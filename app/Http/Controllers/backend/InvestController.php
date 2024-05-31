<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Invest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvestController extends Controller
{
    public function index()
    {
        $invests = Invest::all();
        return view('admin.main.invest.index', compact('invests'));
    }

    public function create()
    {
        return view('admin.main.invest.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'sector' => 'required|string',
                'name' => 'required|string|max:255',
                'amount' => 'required',
            ]);

            $invest = new Invest();
            $invest->sector = $request->sector;
            $invest->name = $request->name;
            $invest->amount = $request->amount;
            
            $invest->save();

            return redirect()->route('invests')->with('success', 'Investment added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function edit(string $id)
    {
        $donation = Invest::find($id);
        return view('admin.main.donation.edit', compact('donation'));
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'amount' => 'required',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072',
            ]);

            $donation = Invest::findOrFail($id);

            $donation->name = $request->input('name');
            $donation->amount = $request->input('amount');
            if ($request->hasFile('photo')) {
                // Delete old image if it exists
                if ($donation->photo) {
                    Storage::delete('public/' . $donation->photo);
                }
                // Store the new image
                $donation->photo = $request->file('photo')->store('donations', 'public');
            }

            $donation->save();

            return redirect()->route('donations')->with('success', 'Donation information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $donation = Invest::find($id);
        // Delete the image if it exists
        if ($donation->image) {
            Storage::disk('public')->delete($donation->image);
        }
        $donation->delete();

        return redirect()->route('donations')->with('success', 'Donation deleted successfully.');
    }
}
