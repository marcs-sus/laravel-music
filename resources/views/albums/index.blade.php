<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Albums
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('albums.create') }}">
                    Create Album
                </a>

                <ul>
                    @foreach($albums as $album)
                        <li>
                            {{ $album->title }} |

                            <a href="{{ route('albums.show', $album) }}">
                                Show
                            </a>
                            -
                            <a href="{{ route('albums.edit', $album) }}">
                                Edit
                            </a>

                            <form action="{{ route('albums.destroy', $album) }}" method="POST">
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