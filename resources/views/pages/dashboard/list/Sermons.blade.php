<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sermons') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mb-4 text-right">
            @can('is_admin')
            <x-jet-nav-link href="{{ route('addsermon') }}" class="font-semibold text-xl">
                {{ __('Create New sermon') }}
            </x-jet-nav-link>
            @endcan
        </div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(session()->has('success'))
                <div class="w-full text-center text-purple-800 text-md">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if(session()->has('message'))
                <div class="w-full text-center text-red-400 text-md">
                    {{ session()->get('message') }}
                </div>
                @endif
                <!-- start -->
                <div class='overflow-x-auto w-full'>
                    @if (count($sermons) > 0)
                    <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                        <thead class="bg-gray-900">
                            <tr class="text-white text-left">
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Image </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Title </th>
                                @can('is_admin')
                                <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($sermons as $sermon)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="inline-flex w-15 h-10"> 
                                        <img class='w-15 h-10 object-cover' 
                                        alt='sermon Avartar' 
                                        src='{{$sermon->image ? asset(config('church.storageImageUrl').'sermons/'.$sermon->image) : asset('images/blog/no-image.png')}}' /> </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class=""> {{$sermon->name}}</p>
                                </td>
                                <td class="px-6 py-4 text-center">{{$sermon->title}} </td>
                                @can('is_admin')
                                <td class="px-6 py-4 text-center"> 
                                    <a href="{{route("editsermon", $sermon->id)}}" class="text-purple-800 hover:underline p-2 m-1">Edit</a> 
                                    <form action="{{route('deletesermon', $sermon->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-pink-800 hover:underline p-2 m-1">Delete</button> 
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="text-center">No sermons Yet</div>
                    @endif
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</x-app-layout>

