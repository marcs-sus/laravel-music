<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Genres</h1>

    <a href="{{ route('genres.create') }}">
        Create Genre
    </a>

    <ul>
        @foreach($genres as $genre)
            <li>
                {{ $genre->name }}

                <a href="{{ route('genres.edit', $genre) }}">
                    Edit
                </a>

                <form action="{{ route('genres.destroy', $genre) }}" method="POST">
                    @csrf
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