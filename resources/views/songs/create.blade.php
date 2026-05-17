<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Song
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('songs.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="text" name="title" placeholder="Song title">
                    <input type="number" name="duration" placeholder="Song duration">
                    <br>

                    <select name="album_id">
                        @foreach($albums as $album)
                            <option value="{{ $album->id }}">
                                {{ $album->title }}
                            </option>
                        @endforeach
                    </select>

                    <p>Artist(s)</p>
                    <ul>
                        @foreach($artists as $artist)
                            <li>
                                <input type="checkbox" name="artists[]" value="{{ $artist->id }}">

                                {{ $artist->name }}
                            </li>
                        @endforeach
                    </ul>

                    <p>Genre(s)</p>
                    <ul>
                        @foreach($genres as $genre)
                            <li>
                                <input type="checkbox" name="genres[]" value="{{ $genre->id }}">

                                {{ $genre->name }}
                            </li>
                        @endforeach
                    </ul>

                    <p>Audio File</p>
                    <input type="file" name="audio_file" accept="audio/*">

                    <br>
                    <button type="submit">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>