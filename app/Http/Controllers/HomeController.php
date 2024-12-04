<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Villa;
use Illuminate\Support\Facades\DB; // Import  facade
class HomeController extends Controller
{
    public function index()
    {
        // Récupérer la première configuration
        $configurations = Configuration::first();

        // Récupérer toutes les villas
        $villas = Villa::first();
        $Heroimages = DB::table('images')->pluck('heroImage')->toArray();
        
        // Split image strings into arrays if they are delimited
        $Heroimages = array_map(fn($image) => explode(';', $image), $Heroimages);
        
        // Flatten the array in case of multiple records
        $Heroimages = array_merge(...$Heroimages);

        $squareImage = DB::table('images')->value('squareImage');
        return view('index', compact('configurations', 'villas','Heroimages','squareImage'));
    }
}
