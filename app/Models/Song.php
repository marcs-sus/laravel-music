<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }
}
