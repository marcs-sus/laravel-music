<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Playlist
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p>Name: {{ $playlist->name }}</p>

                <p>Songs</p>
                <ul>
                    @foreach($songs as $song)
                        <li>
                            {{ $song->title }} - {{ $song->album->title }}

                            <audio controls>
                                <source src="{{ Storage::url($song->file_path) }}" type="audio/mpeg">
                            </audio>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>