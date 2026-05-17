<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Genres
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('genres.create') }}">
                    Create Genre
                </a>

                <ul>
                    @foreach($genres as $genre)
                        <li>
                            {{ $genre->name }} |

                            <a href="{{ route('genres.edit', $genre) }}">
                                Edit
                            </a>

                            <form action="{{ route('genres.destroy', $genre) }}" method="POST">
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