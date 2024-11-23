<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Villa;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer la première configuration
        $configurations = Configuration::first();

        // Récupérer toutes les villas
        $villas = Villa::first();

        // Passer les deux variables à la vue
        return view('index', compact('configurations', 'villas'));
    }
}
