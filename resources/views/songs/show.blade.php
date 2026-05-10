<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Show Song</h1>

    <p>Title: {{ $song->title }}</p>
    <p>Duration: {{ $song->duration }}</p>
    <p>Album: {{ $song->album->title }}</p>

    <p>Artist(s)</p>
    <ul>
        @foreach($artists as $artist)
            <li>
                {{ $artist->name }}
            </li>
        @endforeach
    </ul>

    <p>Genre(s)</p>
    <ul>
        @foreach($genres as $genre)
            <li>
                {{ $genre->name }}
            </li>
        @endforeach
    </ul>

    <audio controls>
        <source src="{{ Storage::url($song->file_path) }}" type="audio/mpeg">
    </audio>
</body>

</html>