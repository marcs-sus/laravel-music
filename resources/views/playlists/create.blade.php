<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Playlist
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('playlists.store') }}" method="POST">

                    @csrf

                    <input type="text" name="name" placeholder="Playlist name">

                    <p>Songs</p>
                    <ul>
                        @foreach($songs as $song)
                            <li>
                                <input type="checkbox" name="songs[]" value="{{ $song->id }}">

                                {{ $song->title }}
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