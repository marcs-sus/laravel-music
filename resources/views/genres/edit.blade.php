<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Edit Genre</h1>

    <form action="{{ route('genres.update', $genre) }}" method="POST">

        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $genre->name }}">

        <br>
        <button type="submit">
            Update
        </button>
    </form>
</body>

</html>