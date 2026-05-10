<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Create Album</h1>

    <form action="{{ route('albums.store') }}" method="POST">

        @csrf

        <input type="text" name="title" placeholder="Album title">
        <input type="date" name="release_date" placeholder="Album release date">

        <p>Artists</p>
        <ul>
            @foreach($artists as $artist)
                <li>
                    <input type="checkbox" name="artists[]" value="{{ $artist->id }}">

                    {{ $artist->name }}
                </li>
            @endforeach
        </ul>

        <p>Genres</p>
        <ul>
            @foreach($genres as $genre)
                <li>
                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}">

                    {{ $genre->name }}
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