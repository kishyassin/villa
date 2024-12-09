<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Villa;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer la première configuration
        $configurations = Configuration::first();

        // Récupérer toutes les villas
        $villas = Villa::first();

        // Récupérer les images depuis la table 'images'
        // $Heroimages = DB::table('images')->pluck('heroImage')->first(); // On récupère une seule ligne contenant les images
        // $Heroimages = json_decode($Heroimages, true); // Décoder le JSON en tableau

        // Vérification si la donnée n'est pas vide

        // $largeHeroImage = json_decode($largeHeroImage, true);
        // Remplacer les barres obliques inverses (\) par des barres normales (/

        // Retourner la vue avec les images
        return view('index', compact('configurations', 'villas'));
    }
}
