<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($rooms as $room)
                    @php $targetName = $room->name ?? $room->users->first(fn ($user) => $user->id != auth()->id())->name @endphp
                        <a href="{{ route('rooms.show', $room->id) }}">
                            <div class="p-2 text-gray-400 flex hover:bg-gray-100">
                                <img src="https://ui-avatars.com/api/?name={{ $targetName }}" class="rounded-full mr-3 w-14 h-14" alt="{{ $targetName }}">
                                <div class="">
                                    <div>{{ $targetName }}</div>
                                    <small>Chats</small>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
