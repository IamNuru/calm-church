<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Donation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mb-4 flex justify-between">
            <x-jet-nav-link href="{{ route('donations') }}" class="font-semibold text-xl">
                {{ __('All Donations') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="{{ route('adddonation') }}" class="font-semibold text-xl">
                {{ __('Create New Donation') }}
            </x-jet-nav-link>
        </div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if ($donation)
                    
                <x-jet-validation-errors class="mb-4" />
                @if(session()->has('success'))
                    <div class="w-full text-center text-purple-800 text-md">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('updatedonation', $donation->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-jet-label for="title" value="{{ __('Title') }}" />
                        <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" value="{{$donation->title}}" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="descriptio" value="{{ __('Description') }}" />
                        <textarea id="description" class="ckeditor block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="description">{{old('description', $donation->description)}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="amount" value="{{ __('Amount') }}" />
                        <x-jet-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" value="{{$donation->amount}}" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="ending_date" value="{{ __('Ending Date') }}" />
                        <x-jet-input id="end_date" class="block mt-1 w-full" type="date" name="ending_date" :value="old('ending_date')" value="{{$donation->ending_date}}" />
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
                                <img src="{{ $donation->image ? asset(config('church.storageImageUrl').'donations/'.$donation->image) : '' }}" alt="{{ $donation->title }}" class="h-20 w-48 object-cover">
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