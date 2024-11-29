<?php

namespace App\Http\Controllers;

use App\Models\VillaPanaromiqueImage;
use Illuminate\Http\Request;

class VillaPanaromiqueImageController extends Controller
{
    public function index()
    {
        $images = VillaPanaromiqueImage::all();
        return view('villa_panaromique_images.index', compact('images'));
    }

    public function create()
    {
        return view('villa_panaromique_images.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image_path_panoramique' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Valide une image optionnelle
        ]);

        if ($request->hasFile('image_path_panoramique')) {
            $data['image_path_panoramique'] = $request->file('image_path_panoramique')->store('panoramiques', 'public');
        }

        VillaPanaromiqueImage::create($data);

        return redirect()->route('villa_panaromique_images.index')->with('success', 'Image enregistrée avec succès !');
    }

    public function destroy(VillaPanaromiqueImage $villaPanaromiqueImage)
    {
        $villaPanaromiqueImage->delete();

        return redirect()->route('villa_panaromique_images.index')->with('success', 'Image supprimée avec succès !');
    }
}
