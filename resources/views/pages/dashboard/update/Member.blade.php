<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mb-4 flex justify-between">
            <x-jet-nav-link href="{{ route('members') }}" class="font-semibold text-xl">
                {{ __('Members') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('users') }}" class="font-semibold text-xl">
                {{ __('Users') }}
            </x-jet-nav-link>
        </div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if ($user)
                <x-jet-validation-errors class="mb-4" />
                @if(session()->has('success'))
                <div class="w-full text-center text-purple-800 text-md">
                    {{ session()->get('success') }}
                </div>
                @endif
                <form method="POST" action="{{ route('updateuser', $user->id) }}">
                    @csrf

                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" value="{{$user->name}}" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" value="{{$user->email}}" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="role" value="{{ __('Role') }}" />
                        <x-jet-input id="role" class="block mt-1 w-full" type="text" name="role" :value="old('role')" value="{{$user->role}}" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="position" value="{{ __('Position') }}" />
                        <x-jet-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" value="{{$user->position}}" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="biography" value="{{ __('Biography') }}" />
                        <textarea id="biography" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="biography">{{old('biography', $user->biography)}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="text" name="password"  />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('UPDATE') }}
                        </x-jet-button>
                    </div>
                </form>
                @else
                <div class="text-center">
                    <div class="text-pink-600 text-md">Something Went Wrong!!!</div>
                    <div class="text-sm text-gray-600">The user/member might not be available any more</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>