<?php

namespace App\Http\Controllers;

use App\Models\Worksheet;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Aktív munkák lekérése
        $activeWorksCount = Worksheet::where('closed', false)->count();

        // Lezárt munkák lekérése
        $closedWorksCount = Worksheet::where('closed', true)->count();

        return view('home', compact('activeWorksCount', 'closedWorksCount'));
    }
}
