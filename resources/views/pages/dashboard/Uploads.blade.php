<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uploads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-48 p-4">
                <p>Please specify what you want to upload</p>
                <div class="flex my-4">
                    <x-jet-nav-link href="{{ route('addsong') }}" class="px-4 mx-4 font-semibold text-xl">
                        {{ __('Song/Music') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('addparephenial') }}" class="px-4 mx-4 font-semibold text-xl">
                        {{ __('Parephenial') }}
                    </x-jet-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>