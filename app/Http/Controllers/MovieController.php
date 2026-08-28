<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the movies.
     */
    public function index()
    {
        $movies = Movie::latest()->get();

        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new movie.
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created movie in the database.
     */
    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();

        $data['image'] = $request->file('image')
            ->store('movies', 'public');

        Movie::create($data);

        return redirect()
            ->route('admin.movies.index')
            ->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified movie.
     */
    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified movie.
     */
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    /**
     * Update the specified movie in the database.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            // Delete the old poster
            if ($movie->image) {
                Storage::disk('public')->delete($movie->image);
            }

            // Store the new poster
            $data['image'] = $request->file('image')
                ->store('movies', 'public');
        }

        $movie->update($data);

        return redirect()
            ->route('admin.movies.index')
            ->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified movie from the database.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->image) {
            Storage::disk('public')->delete($movie->image);
        }

        $movie->delete();

        return redirect()
            ->route('admin.movies.index')
            ->with('success', 'Movie deleted successfully.');
    }
}
