<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Songs</h1>

    <a href="{{ route('songs.create') }}">
        Create Song
    </a>

    <ul>
        @foreach($songs as $song)
            <li>
                {{ $song->title }}

                <a href="{{ route('songs.show', $song) }}">
                    Show
                </a>

                <a href="{{ route('songs.edit', $song) }}">
                    Edit
                </a>

                <form action="{{ route('songs.destroy', $song) }}" method="POST">
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