<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Edit Playlists</h1>

    <form action="{{ route('playlists.update', $playlist) }}" method="POST"">

        @csrf
        @method('PUT')

        <input type=" text" name="name" value="{{ $playlist->name }}">

        <p>Songs</p>
        <ul>
            @foreach($songs as $song)
                <li>
                    <input type="checkbox" name="songs[]" value="{{ $song->id }}" {{ $playlist->songs->contains($song->id) ? 'checked' : '' }}>

                    {{ $song->title }}
                </li>
            @endforeach
        </ul>

        <br>
        <button type="submit">
            Update
        </button>
    </form>
</body>

</html>