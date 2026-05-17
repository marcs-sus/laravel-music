<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Create Playlist</h1>

    <form action="{{ route('playlists.store') }}" method="POST">

        @csrf

        <input type="text" name="name" placeholder="Playlist name">

        <p>Songs</p>
        <ul>
            @foreach($songs as $song)
                <li>
                    <input type="checkbox" name="songs[]" value="{{ $song->id }}">

                    {{ $song->title }}
                </li>
            @endforeach
        </ul>

        <br>
        <button type="submit">
            Save
        </button>
    </form>
</body>

</html>