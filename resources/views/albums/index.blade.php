<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Albums</h1>

    <a href="{{ route('albums.create') }}">
        Create Album
    </a>

    <ul>
        @foreach($albums as $album)
            <li>
                {{ $album->title }}

                <a href="{{ route('albums.show', $album) }}">
                    Show
                </a>

                <a href="{{ route('albums.edit', $album) }}">
                    Edit
                </a>

                <form action="{{ route('albums.destroy', $album) }}" method="POST">
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