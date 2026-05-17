<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Show Playlist</h1>

    <p>Name: {{ $playlist->name }}</p>

    <p>Songs</p>
    <ul>
        @foreach($songs as $song)
            <li>
                {{ $song->title }} - {{ $song->album->title }}

                <audio controls>
                    <source src="{{ Storage::url($song->file_path) }}" type="audio/mpeg">
                </audio>
            </li>
        @endforeach
    </ul>
</body>

</html>