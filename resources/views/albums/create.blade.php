<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Album
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
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
            </div>
        </div>
    </div>
</x-app-layout>