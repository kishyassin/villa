<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard view.
     */
    public function index()
    {
        $user = Auth::user();
        dd($user); // Récupère l'utilisateur authentifié
        return view('dashboard', compact('user'));  // Transmet la variable $user à la vue
    }
}
