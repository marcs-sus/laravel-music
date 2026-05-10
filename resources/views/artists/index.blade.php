<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Artists</h1>

    <a href="{{ route('artists.create') }}">
        Create Artist
    </a>

    <ul>
        @foreach($artists as $artist)
            <li>
                {{ $artist->name }}

                <a href="{{ route('artists.show', $artist) }}">
                    Show
                </a>

                <a href="{{ route('artists.edit', $artist) }}">
                    Edit
                </a>

                <form action="{{ route('artists.destroy', $artist) }}" method="POST">
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