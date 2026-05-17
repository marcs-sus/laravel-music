<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Playlists
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('playlists.create') }}">
                    Create Playlists
                </a>

                <ul>
                    @foreach($playlists as $playlist)
                        <li>
                            {{ $playlist->name }} |

                            <a href="{{ route('playlists.show', $playlist) }}">
                                Show
                            </a>
                            -
                            <a href="{{ route('playlists.edit', $playlist) }}">
                                Edit
                            </a>

                            <form action="{{ route('playlists.destroy', $playlist) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    └Delete
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>