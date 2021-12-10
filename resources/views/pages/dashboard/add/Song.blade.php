<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Song') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4 text-right">
            <x-jet-nav-link href="{{ route('songs') }}" class="font-semibold text-xl">
                {{ __('All songs') }}
            </x-jet-nav-link>
        </div>
        <div class="max-w-7xl sm:flex sm:justify-between sm:px-6 lg:px-8 ">
            <div class="flex-1 bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('storesong') }}" enctype="multipart/form-data" >
                    @csrf

                    <div>
                        <x-jet-label for="title" value="{{ __('Title') }}" />
                        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" minlength="3" maxlength="75" required autofocus autocomplete="off" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="artist" value="{{ __('Artist:') }}" />
                        <x-jet-input id="artist" class="block mt-1 w-full" type="text" name="artist" :value="old('artist')" required/>
                    </div>


                    <div class="mt-4">
                        <x-jet-label for="genre" value="{{ __('Genre:') }}" />
                        <x-jet-input id="genre" class="block mt-1 w-full" type="text" name="genre" :value="old('genre')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <textarea id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description">{{old('description')}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="content" value="{{ __('content') }}" />
                        <textarea id="content" class="ckeditor block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="content" >{{old('content')}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="lyrics" value="{{ __('lyrics') }}" />
                        <textarea id="lyrics" class="ckeditor block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="lyrics">{{old('lyrics')}}</textarea>
                    </div>

                    <div class="mt-4">
                        <livewire:categories.song>
                    </div>


                    <div class="mt-4">
                        <x-jet-label for="song" value="{{ __('Song') }}" />
                        <x-jet-input id="song" class="block mt-1 w-full" type="file" name="song" :value="old('song')" accept="audio/*" required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="cover_photo" value="{{ __('Cover photo') }}" />
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <input type="file" class="hidden" name="cover_photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />
                            <div class="mt-2" x-show="photoPreview">
                                <span class="block w-48 h-20 bg-cover bg-no-repeat bg-center"
                                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                        
                            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                {{ __('Select song cover photo') }}
                            </x-jet-secondary-button>
                        </div>
                    </div>
                    <div class="mt-4">
                        <livewire:tags>
                    </div>

                    <div class="mt-4">
                        <div class="flex flex-wrap">
                            <div class="max-w-96">
                                <x-jet-label for="amount" value="{{ __('Amount') }}" />
                                <x-jet-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" autocomplete="off" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('SUBMIT') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
            <div class="max-w-2xl sm:ml-4 mt-4 sm:mt-0">
                <livewire:song-category>
                <div class="mt-8 p-4">
                    <livewire:create-tag>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
