<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Artists
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('artists.create') }}">
                    Create Artist
                </a>

                <ul>
                    @foreach($artists as $artist)
                        <li>
                            {{ $artist->name }} |

                            <a href="{{ route('artists.show', $artist) }}">
                                Show
                            </a>
                            -
                            <a href="{{ route('artists.edit', $artist) }}">
                                Edit
                            </a>

                            <form action="{{ route('artists.destroy', $artist) }}" method="POST">
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