<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    // Display a list of all villas
    public function index()
    {
        // Fetch all villas with pagination
        $villas = Villa::with('images')->paginate(10);

        return view('villas.index', compact('villas'));
    }

    // Show details for a specific villa
    public function show($id)
    {
        // Fetch the villa with its images
        $villa = Villa::with('images')->findOrFail($id);

        return view('villa.show', compact('villa'));
    }

    // Store a new villa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'price' => 'required|numeric',
            'rooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'area' => 'required|numeric',
            'is_available' => 'required|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create the villa
        $villa = Villa::create($validated);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('villas', 'public'); // Store in 'storage/app/public/villas'
                $villa->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('villas.index')->with('success', 'Villa created successfully.');
    }

    // Update an existing villa
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes',
            'location' => 'sometimes|string|max:255',
            'ville' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric',
            'rooms' => 'sometimes|integer|min:1',
            'bathrooms' => 'sometimes|integer|min:1',
            'area' => 'sometimes|numeric',
            'is_available' => 'sometimes|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $villa = Villa::findOrFail($id);

        // Update villa details
        $villa->update($validated);

        // Handle new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('villas', 'public');
                $villa->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('villas.show', $id)->with('success', 'Villa updated successfully.');
    }

    // Delete a villa
    public function destroy($id)
    {
        $villa = Villa::findOrFail($id);

        // Delete associated images
        foreach ($villa->images as $image) {
            \Storage::delete('public/' . $image->image_path);
        }

        $villa->delete();

        return redirect()->route('villas.index')->with('success', 'Villa deleted successfully.');
    }
    

}
   