<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Artist
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('artists.update', $artist) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <input type="text" name="name" value="{{ $artist->name }}">
                    <input type="text" name="bio" value="{{ $artist->bio }}">

                    <br>
                    <button type="submit">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>