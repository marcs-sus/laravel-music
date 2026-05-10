<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Edit Song</h1>

    <form action="{{ route('songs.update', $song) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $song->title }}">
        <input type="number" name="duration" value="{{ $song->duration }}">

        <select name="album_id">
            @foreach($albums as $album)
                <option value="{{ $album->id }}" {{ $song->album_id == $album->id ? 'selected' : '' }}>
                    {{ $album->title }}
                </option>
            @endforeach
        </select>

        <p>Artist(s)</p>
        <ul>
            @foreach($artists as $artist)
                <li>
                    <input type="checkbox" name="artists[]" value="{{ $artist->id }}" {{ $song->artists->contains($artist->id) ? 'checked' : '' }}>

                    {{ $artist->name }}
                </li>
            @endforeach
        </ul>

        <p>Genre(s)</p>
        <ul>
            @foreach($genres as $genre)
                <li>
                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}" {{ $song->genres->contains($genre->id) ? 'checked' : '' }}>

                    {{ $genre->name }}
                </li>
            @endforeach
        </ul>

        <p>Audio File</p>
        <input type="file" name="audio" accept="audio/*" value="{{ $song->audio }}">

        <br>
        <button type="submit">
            Update
        </button>
    </form>
</body>

</html>