<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->get();

        return view('home.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        return view('home.show', compact('movie'));
    }
}