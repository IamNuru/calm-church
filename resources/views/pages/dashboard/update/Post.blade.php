<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mb-4 flex justify-between">
            <x-jet-nav-link href="{{ route('posts') }}" class="font-semibold text-xl">
                {{ __('All Posts') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('addpost') }}" class="font-semibold text-xl">
                {{ __('Create New Post') }}
            </x-jet-nav-link>
        </div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if ($post)
                <x-jet-validation-errors class="mb-4" />
                
                <form method="POST" action="{{ route('updatepost', $post->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-jet-label for="title" value="{{ __('Title') }}" />
                        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" value="{{$post->title}}" required autofocus  />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <textarea id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description" :value="old('description')">{{old('description', $post->description)}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="content" value="{{ __('content') }}" />
                        <textarea id="content" class="ckeditor block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="content" :value="old('content')" >{{old('content', $post->content)}}</textarea>
                    </div>

                    <div class="mt-4">
                        <livewire:categories.post>
                    </div>

                    <div class="mt-4">
                        <livewire:tags>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="rank" value="{{ __('rank') }}" />
                        <select name="rank" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value={{1}} selected={{$post->rank}}>1</option>
                            <option value={{2}} selected={{$post->rank}}>2</option>
                            <option value={{3}} selected={{$post->rank}}>3</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="header" value="{{ __('Use in Header') }}" />
                        <select name="header" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value={{0}} selected={{$post->header}}>false</option>
                            <option value={{1}} selected={{$post->header}}>true</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="image" value="{{ __('Image') }}" />
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <input type="file" class="hidden" name="image"
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
                            <!-- Current Photo -->
                            <div class="mt-2" x-show="! photoPreview">
                                <img src="{{ $post->image ? asset(config('church.storageImageUrl').'posts/'.$post->image) : '' }}" alt="{{ $post->title }}" class="h-20 w-48 object-cover">
                            </div>
                        
                            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                {{ __('Select A New Photo') }}
                            </x-jet-secondary-button>
                        </div>
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
                        <div class="text-sm text-gray-600">The post might not be available any more</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>


<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>