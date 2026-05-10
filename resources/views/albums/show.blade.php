<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Show Album</h1>

    <p>Title: {{ $album->title }}</p>
    <p>Release Date: {{ $album->release_date }}</p>

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
</body>

</html>