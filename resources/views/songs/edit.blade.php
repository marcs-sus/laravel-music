<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Song
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('songs.update', $song) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <input type="text" name="title" value="{{ $song->title }}">
                    <input type="number" name="duration" value="{{ $song->duration }}">

                    <select name="album_id">
                        @foreach($albums as $album)
                            <option value="{{ $album->id }}" {{ $song->album_id == $album->id ? 'selected' : '' }}>
                                {{ $album->title }}
                            </option>
                        @endforeach
                    </select>

                    <p>Artist(s)</p>
                    <ul>
                        @foreach($artists as $artist)
                            <li>
                                <input type="checkbox" name="artists[]" value="{{ $artist->id }}" {{ $song->artists->contains($artist->id) ? 'checked' : '' }}>

                                {{ $artist->name }}
                            </li>
                        @endforeach
                    </ul>

                    <p>Genre(s)</p>
                    <ul>
                        @foreach($genres as $genre)
                            <li>
                                <input type="checkbox" name="genres[]" value="{{ $genre->id }}" {{ $song->genres->contains($genre->id) ? 'checked' : '' }}>

                                {{ $genre->name }}
                            </li>
                        @endforeach
                    </ul>

                    <p>Audio File</p>
                    <input type="file" name="audio" accept="audio/*" value="{{ $song->audio }}">

                    <br>
                    <button type="submit">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>