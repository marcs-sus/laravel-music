<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Songs
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('songs.create') }}">
                    Create Song
                </a>

                <ul>
                    @foreach($songs as $song)
                        <li>
                            {{ $song->title }} |

                            <a href="{{ route('songs.show', $song) }}">
                                Show
                            </a>
                            -
                            <a href="{{ route('songs.edit', $song) }}">
                                Edit
                            </a>

                            <form action="{{ route('songs.destroy', $song) }}" method="POST">
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