<?php

namespace App\Http\Controllers;

use App\Models\Configuration;

class HomeController extends Controller
{
    public function index()
    {
        $configurations = Configuration::first();
        return view('index', compact('configurations'));
    }
}
