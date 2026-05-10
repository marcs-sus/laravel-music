<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Edit Artist</h1>

    <form action="{{ route('artists.update', $artist) }}" method="POST">

        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $artist->name }}">
        <input type="text" name="bio" value="{{ $artist->bio }}">

        <br>
        <button type="submit">
            Update
        </button>
    </form>
</body>

</html>