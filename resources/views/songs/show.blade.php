<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Song
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p>Title: {{ $song->title }}</p>
                <p>Duration: {{ $song->duration }}</p>
                <p>Album: {{ $song->album->title }}</p>

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

                <audio controls>
                    <source src="{{ Storage::url($song->file_path) }}" type="audio/mpeg">
                </audio>
            </div>
        </div>
    </div>
</x-app-layout>