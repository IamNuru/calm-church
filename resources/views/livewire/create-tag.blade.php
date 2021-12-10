
<div class="overflow-auto shadow-xl sm:rounded-lg">
    <div class="bg-white">
        <p class="text-md ml-2 font-semibold">
            Add New tag
        </p>
        <div class="bg-white overflow-hidden  sm:rounded-lg px-4 pb-4"> 
            @if (session()->has('success'))
                <p class="text-green-600 text-center">{{session()->get('success') }}</p>
            @endif
            @if (session()->has('error'))
                <p class="text-red-600 text-center">{{session()->get('error') }}</p>
            @endif
            @if ($hiddenId)
                <button class="text-pink-600 text-sm text-right w-full" wire:click="clear">
                    {{ __('Reset Form') }}
                </button>
            @endif
            <form  wire:submit.prevent="store">
            {{-- <form  wire:submit.prevent="store((Object.fromEntries(new FormData($event.target))))"> --}}
                @csrf
               <input type="hidden" name="hiddenid">
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model="name" name="name" :value="old('name')" value="{{$tag ? $tag->name : '' }}" required autocomplete="off" />
                    <x-jet-input-error for="name" class="mt-1" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-jet-input id="description" class="block mt-1 w-full" type="text" wire:model="description" name="description" :value="old('description')" value="{{$tag ? $tag->description : '' }}" autocomplete="off" />
                    <x-jet-input-error for="description" class="mt-1" />
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>
                    
                    @if ($hiddenId)
                    <x-jet-button>
                        {{ __('Update') }}
                    </x-jet-button>
                    @else
                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                    @endif
                </div>
            </form>
            <div class='overflow-x-auto w-full mt-4'>
                <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                    @if (count($tags) > 0)
                    <thead class="bg-gray-700" style="background-color: rgb(182, 174, 174)">
                        <tr class="text-white text-left">
                            <th class="font-semibold text-sm px-6 py-2"> Name </th>
                            <th class="font-semibold text-sm px-6 py-2"> # of posts </th>
                            <th class="font-semibold text-sm px-6 py-2"> </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($tags as $tag)
                        <tr>
                            <td class="px-2 py-2">
                                <p md:text-md sm:text-sm> {{$tag->name}} </p>
                            </td>
                            <td class="px-6 py-2 text-center">
                                <p class=""> {{count($tag->posts)}} </p>
                            </td>
                            <td class="px-2 py-2 text-center flex flex-wrap"> 
                                <button wire:click="edittag({{$tag->id}})" class="mx-2 text-purple-800 hover:underline">Edit</a> 
                                <button wire:click="destroy({{$tag->id}})" class="mx-2 text-pink-800 hover:underline">Delete</button> 
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>
                    {{$tags->links()}}
                    @else
                        No tags yet
                    @endif
                </table>
            </div>
        </div>
    </div>
</div> 