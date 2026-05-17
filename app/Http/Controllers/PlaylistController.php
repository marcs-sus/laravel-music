<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = auth()
            ->user()
            ->playlists()
            ->with('songs')
            ->get();

        return view('playlists.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $songs = Song::all();

        return view('playlists.create', compact('songs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'songs' => 'nullable|array',
            'songs.*' => 'exists:songs,id'
        ]);

        $playlist = Playlist::create([
            'name' => $validated['name'],
            'user_id' => auth()->id()
        ]);

        $playlist->songs()->attach($validated['songs']);

        return redirect()->route('playlists.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        $songs = $playlist->songs;

        if ($playlist->user_id !== auth()->id()) {
            abort(403);
        }

        return view('playlists.show', compact(
            'playlist',
            'songs'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) {
            abort(403);
        }

        $songs = Song::all();

        return view('playlists.edit', compact(
            'playlist',
            'songs'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'songs' => 'nullable|array',
            'songs.*' => 'exists:songs,id'
        ]);

        $playlist->update([
            'name' => $validated['name']
        ]);

        $playlist->songs()->sync($validated['songs']);

        return redirect()->route('playlists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) {
            abort(403);
        }

        $playlist->delete();

        return redirect()->route('playlists.index');
    }
}
