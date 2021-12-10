<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mb-4 flex justify-between">
            <x-jet-nav-link href="{{ route('parephenials') }}" class="font-semibold text-xl">
                {{ __('All Parephenials') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('addparephenial') }}" class="font-semibold text-xl">
                {{ __('Upload New Parephenial') }}
            </x-jet-nav-link>
        </div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if ($par)
                <x-jet-validation-errors class="mb-4" />
                <form method="POST" action="{{ route('updateparephenial', $par->id) }}">
                    @csrf

                    <div>
                        <x-jet-label for="title" value="{{ __('Title') }}" />
                        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" value="{{$par->title}}" required autofocus />
                    </div>
                    
                    <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <textarea id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description" >{{old('description', $par->description)}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="content" value="{{ __('content') }}" />
                        <textarea id="content" class="ckeditor block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="content" >{{old('content', $par->content)}}</textarea>
                    </div>


                    <div class="mt-4">
                        <x-jet-label for="category" value="{{ __('category') }}" />
                        <select name="category" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="category1">Category 1</option>
                            <option value="category1">Category 1</option>
                            <option value="category1">Category 1</option>
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
                                <img src="{{ $par->image ? asset(config('church.storageImageUrl').'products/'.$par->image) : '' }}" alt="{{ $par->title }}" class="h-20 w-48 object-cover">
                            </div>
                        
                            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                {{ __('Select An Image') }}
                            </x-jet-secondary-button>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="flex flex-wrap">
                            <div class="mr-2 w-48">
                                <x-jet-label for="amount" value="{{ __('Amount') }}" />
                                <x-jet-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" value="{{$par->amount+0}}" autocomplete="off" />
                            </div>
                            <div class="w-48 mr-2">
                                <x-jet-label for="discount" value="{{ __('Reduction') }}" />
                                <x-jet-input id="discount" class="block mt-1 w-full" type="number" name="discount" :value="old('discount')" value="{{$par->discount+0}}" autocomplete="off" />
                            </div>
                            <div class="w-48">
                                <x-jet-label for="qty" value="{{ __('Qty') }}" />
                                <x-jet-input id="qty" class="block mt-1 w-full" type="number" name="qty" :value="old('qty')" value="{{$par->qty+0}}" autocomplete="off" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('SUBMIT') }}
                        </x-jet-button>
                    </div>
                </form>
                @else
                    <div class="text-center">
                        <div class="text-pink-600 text-md">Something Went Wrong!!!</div>
                        <div class="text-sm text-gray-600">The parephenial might not be available any more</div>
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