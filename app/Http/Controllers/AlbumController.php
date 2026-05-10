<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::with([
            'artists',
            'genres'
        ])->get();

        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists = Artist::all();
        $genres = Genre::all();

        return view('albums.create', compact(
            'artists',
            'genres'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'artists' => 'required|array',

            'artists.*' => 'exists:artists,id',

            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        $album = Album::create([
            'title' => $validated['title'],
            'release_date' => $validated['release_date']
        ]);

        $album->artists()->attach($validated['artists']);
        $album->genres()->attach($validated['genres']);

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $artists = $album->artists;
        $genres = $album->genres;

        return view('albums.show', compact(
            'album',
            'artists',
            'genres'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        $artists = Artist::all();
        $genres = Genre::all();

        return view('albums.edit', compact(
            'album',
            'artists',
            'genres'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'nullable|date',
            'artists' => 'required|array',
            'genres' => 'required|array'
        ]);

        $album->update([
            'title' => $validated['title'],
            'release_date' => $validated['release_date']
        ]);

        $album->artists()->sync($validated['artists']);
        $album->genres()->sync($validated['genres']);

        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();

        return redirect()->route('artists.index');
    }
}
