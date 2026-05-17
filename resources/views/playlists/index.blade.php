<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Playlists</h1>

    <a href="{{ route('playlists.create') }}">
        Create Playlists
    </a>

    <ul>
        @foreach($playlists as $playlist)
            <li>
                {{ $playlist->name }}

                <a href="{{ route('playlists.show', $playlist) }}">
                    Show
                </a>

                <a href="{{ route('playlists.edit', $playlist) }}">
                    Edit
                </a>

                <form action="{{ route('playlists.destroy', $playlist) }}" method="POST">
                    @csrf\
                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</body>

</html>