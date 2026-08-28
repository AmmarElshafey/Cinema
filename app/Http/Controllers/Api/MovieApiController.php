<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieApiController extends Controller
{
    /**
     * Display all movies.
     */
    public function index()
    {
        $movies = Movie::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Movies retrieved successfully.',
            'data' => $movies,
        ]);
    }


    /**
     * Display one movie.
     */
    public function show(Movie $movie)
    {
        return response()->json([
            'success' => true,
            'message' => 'Movie retrieved successfully.',
            'data' => $movie,
        ]);
    }


    /**
     * Create a new movie.
     */
    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();

        $data['image'] = $request->file('image')
            ->store('movies', 'public');

        $movie = Movie::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Movie created successfully.',
            'data' => $movie,
        ], 201);
    }


    /**
     * Update an existing movie.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            if ($movie->image) {
                Storage::disk('public')->delete($movie->image);
            }

            $data['image'] = $request->file('image')
                ->store('movies', 'public');
        }

        $movie->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Movie updated successfully.',
            'data' => $movie,
        ]);
    }


    /**
     * Delete a movie.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->image) {
            Storage::disk('public')->delete($movie->image);
        }

        $movie->delete();

        return response()->json([
            'success' => true,
            'message' => 'Movie deleted successfully.',
        ]);
    }
}