<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }
}
