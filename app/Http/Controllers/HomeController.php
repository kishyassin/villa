<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Villa;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Method to fetch comments
    public function fetchComments()
{
    // Fetch the last 6 comments joined with user data
    $comments = DB::table('comments')
        ->join('users', 'comments.idUser', '=', 'users.id')
        ->where('comments.is_accept_show', 1) // Only accepted comments
        ->orderBy('comments.created_at', 'desc') // Order by latest
        ->select(
            'comments.comment_text',
            'comments.created_at',
            'users.name',
            'users.avatar'
        )
        ->take(6) // Fetch only the last 6 comments
        ->get(); // Fetch the result as a collection

    return $comments; // Return the fetched comments
}


    // Main controller method for the home page
    public function index()
    {
        // Retrieve the first configuration
        $configurations = Configuration::first();

        // Retrieve the first villa
        $villas = Villa::first();

        // Retrieve images from the respective tables
        $Heroimages = DB::table('hero_images')->pluck('heroimagepath')->toArray();
        $SquareImage = DB::table('square_images')->pluck('squareimagespath')->first();
        $PanaromaImage = DB::table('panaroma_images')->pluck('panaromaimagepath')->first();
        $StripeImage = DB::table('stripe_images')->pluck('stripeimagepath')->first();
        $LargeImage = DB::table('large_images')->pluck('largeimagepath')->first();

        // Fetch comments
        $comments = $this->fetchComments(); // Use $this to call the fetchComments method

        // Return the view with all data
        return view('index', compact('configurations', 'villas', 'Heroimages', 'SquareImage', 'PanaromaImage', 'StripeImage', 'LargeImage', 'comments'));
    }
}
