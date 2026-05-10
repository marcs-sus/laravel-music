<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <h1>Create Genre</h1>

    <form action="{{ route('genres.store') }}" method="POST">

        @csrf

        <input type="text" name="name" placeholder="Genre name">

        <br>
        <button type="submit">
            Save
        </button>
    </form>
</body>

</html>