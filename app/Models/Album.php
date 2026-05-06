<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
