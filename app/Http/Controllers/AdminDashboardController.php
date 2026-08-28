<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $movieCount = Movie::count();

        $averageRating = Movie::avg('rating');

        $latestRelease = Movie::max('release_year');

        $recentMovies = Movie::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'user',
            'movieCount',
            'averageRating',
            'latestRelease',
            'recentMovies'
        ));
    }
}