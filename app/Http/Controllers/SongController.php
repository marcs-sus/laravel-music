<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::with([
            'album',
            'artists',
            'genres'
        ])->get();

        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();
        $artists = Artist::all();
        $genres = Genre::all();

        return view('songs.create', compact(
            'albums',
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
            'duration' => 'required|integer|min:1',
            'album_id' => 'required|exists:albums,id',

            'artists' => 'required|array',
            'artists.*' => 'exists:artists,id',

            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',

            'audio_file' => 'nullable|file|mimes:mp3,wav,webm|max:10240'
        ]);

        $filePath = null;
        if ($request->hasFile('audio_file')) {
            $filePath = $request
                ->file('audio_file')
                ->store('songs', 'public');
        }

        $song = Song::create([
            'title' => $validated['title'],
            'duration' => $validated['duration'],
            'album_id' => $validated['album_id'],
            'file_path' => $filePath
        ]);

        $song->artists()->attach($validated['artists']);
        $song->genres()->attach($validated['genres']);

        return redirect()->route('songs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        $album = $song->album;
        $artists = $song->artists;
        $genres = $song->genres;

        return view('songs.show', compact(
            'song',
            'album',
            'artists',
            'genres'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        $albums = Album::all();
        $artists = Artist::all();
        $genres = Genre::all();

        return view('songs.edit', compact(
            'song',
            'albums',
            'artists',
            'genres'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'album_id' => 'required|exists:albums,id',

            'artists' => 'required|array',
            'artists.*' => 'exists:artists,id',

            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',

            'audio_file' => 'nullable|file|mimes:mp3,wav,webm|max:10240'
        ]);

        if ($request->hasFile('audio_file')) {
            if ($song->file_path) {
                Storage::disk('public')
                    ->delete($song->file_path);
            }

            $filePath = $request
                ->file('audio_file')
                ->store('songs', 'public');
        } else {
            $filePath = $song->file_path;
        }

        $song->update([
            'title' => $validated['title'],
            'duration' => $validated['duration'],
            'album_id' => $validated['album_id'],
            'file_path' => $filePath
        ]);

        $song->artists()->sync($validated['artists']);
        $song->genres()->sync($validated['genres']);

        return redirect()->route('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        if ($song->file_path) {
            Storage::disk('public')
                ->delete($song->file_path);
        }

        $song->delete();

        return redirect()->route('songs.index');
    }
}
