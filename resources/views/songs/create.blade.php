<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Create Song</h1>

    <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <input type="text" name="title" placeholder="Song title">
        <input type="number" name="duration" placeholder="Song duration">
        <br>

        <select name="album_id">
            @foreach($albums as $album)
                <option value="{{ $album->id }}">
                    {{ $album->title }}
                </option>
            @endforeach
        </select>

        <p>Artist(s)</p>
        <ul>
            @foreach($artists as $artist)
                <li>
                    <input type="checkbox" name="artists[]" value="{{ $artist->id }}">

                    {{ $artist->name }}
                </li>
            @endforeach
        </ul>

        <p>Genre(s)</p>
        <ul>
            @foreach($genres as $genre)
                <li>
                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}">

                    {{ $genre->name }}
                </li>
            @endforeach
        </ul>

        <p>Audio File</p>
        <input type="file" name="audio_file" accept="audio/*">

        <br>
        <button type="submit">
            Save
        </button>
    </form>
</body>

</html>