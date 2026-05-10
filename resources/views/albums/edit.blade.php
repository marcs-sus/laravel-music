<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Edit Album</h1>

    <form action="{{ route('albums.update', $album) }}" method="POST">

        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $album->title }}">
        <input type="date" name="release_date" value="{{ $album->release_date }}">

        <p>Artist(s)</p>
        <ul>
            @foreach($artists as $artist)
                <li>
                    <input type="checkbox" name="artists[]" value="{{ $artist->id }}" {{ $album->artists->contains($artist->id) ? 'checked' : '' }}>

                    {{ $artist->name }}
                </li>
            @endforeach
        </ul>

        <p>Genre(s)</p>
        <ul>
            @foreach($genres as $genre)
                <li>
                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}" {{ $album->genres->contains($genre->id) ? 'checked' : '' }}>

                    {{ $genre->name }}
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