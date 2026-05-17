<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Album
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
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
            </div>
        </div>
    </div>
</x-app-layout>