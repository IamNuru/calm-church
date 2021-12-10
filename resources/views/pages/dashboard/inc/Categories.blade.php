{{-- <div class="overflow-auto shadow-xl sm:rounded-lg">
    <div class="bg-white">
        <p class="text-md ml-2 font-semibold">
            Add New Category
        </p>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 pb-4"> --}}
            <x-jet-form-section submit="updatePassword">
                <x-slot name="title">
                    {{ __('Update Password') }}
                </x-slot>
            
                <x-slot name="description">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </x-slot>
            
                <x-slot name="form">
            {{-- <form method="POST" action="{{ route('register') }}"> --}}
               {{--  @csrf --}}

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="off" />
                </div>

                {{-- <div class="flex items-center justify-end mt-2">
                    <x-jet-button class="ml-4">
                        {{ __('ADD') }}
                    </x-jet-button>
                </div> --}}
            {{-- </form> --}}
                </x-slot>
            {{-- <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>
        
                <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot> --}}
            </x-jet-form-section>
            {{-- <div class='overflow-x-auto w-full mt-4'>
                <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                    <thead class="bg-gray-700" style="background-color: rgb(182, 174, 174)">
                        <tr class="text-white text-left">
                            <th class="font-semibold text-sm px-6 py-2"> Name </th>
                            <th class="font-semibold text-sm px-6 py-2"> # of posts </th>
                            <th class="font-semibold text-sm px-6 py-2"> </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-2 py-2">
                                <p md:text-md sm:text-sm> Mira Rodeo </p>
                            </td>
                            <td class="px-6 py-2">
                                <p class=""> 100 </p>
                            </td>
                            {{-- <td class="px-2 py-2 text-center flex flex-wrap"> 
                                <a href="{{route("editpost")}}" class="mx-2 text-purple-800 hover:underline">Edit</a> 
                                <a href="{{route("editpost")}}" class="mx-2 text-pink-800 hover:underline">Delete</a> 
                            </td> -
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}