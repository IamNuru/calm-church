<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Songs') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4 text-right">
            @can('is_admin')
            <x-jet-nav-link href="{{ route('addsong') }}" class="font-semibold text-xl">
                {{ __('Upload New Song') }}
            </x-jet-nav-link>
            @endcan
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(session()->has('success'))
                <div class="w-full text-center text-purple-800 text-md">
                    {{ session()->get('success') }}
                </div>
                @endif
                <!-- start -->
                <div class='overflow-x-auto w-full'>
                    @if (count($songs) > 0)
                    <table class='mx-auto max-w-7xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                        <thead class="bg-gray-900">
                            <tr class="text-white text-left">
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Artist </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Title </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Category </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Price </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> downloads </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($songs as $song)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3 overflow-auto" style="max-width: 18.5rem">
                                        <div class="inline-flex w-10 h-10"> 
                                            <img class='w-10 h-10 object-cover rounded-full' 
                                            alt='song avatar' 
                                            src='{{$song->cover_image ? asset(config('church.storageImageUrl').'songs/cover/'.$song->cover_image) : asset('images/person/no-image-avatar.jpeg')}}' /> </div>
                                        <div>
                                            <p> {{$song->artist}} </p>
                                            <p class="text-gray-500 text-sm font-semibold tracking-wide"> {{$song->getFirstMediaUrl()}} </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class=""> {{$song->title}}</p>
                                </td>
                                <td class="px-6 py-4 text-center"> {{$song->category}}</td>
                                <td class="px-6 py-4 text-center"> {{$song->amount}} </td>
                                <td class="px-6 py-4 text-center"> {{$song->downloads}} </td>
                                <td class="px-6 py-4 text-center"> 
                                    @can('is_admin')
                                    <a href="{{route("editsong", $song->id)}}" class="text-purple-800 hover:underline">Edit</a> 
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="text-center">No songs Yet</div>
                    @endif
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</x-app-layout>

