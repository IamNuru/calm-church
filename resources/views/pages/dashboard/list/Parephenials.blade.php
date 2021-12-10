<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Songs') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4 text-right">
            @can('is_admin')
            <x-jet-nav-link href="{{ route('addparephenial') }}" class="font-semibold text-xl">
                {{ __('Upload New Parephenial') }}
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
                @if(session()->has('error'))
                <div class="w-full text-center text-pink-800 text-md">
                    {{ session()->get('error') }}
                </div>
                @endif
                <!-- start -->
                <div class='overflow-x-auto w-full'>
                    @if (count($pars) > 0)
                    <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                        <thead class="bg-gray-900">
                            <tr class="text-white text-left">
                                <th class="font-semibold text-sm uppercase px-6 py-2"> Image </th>
                                <th class="font-semibold text-sm uppercase px-6 py-2"> Title </th>
                                <th class="font-semibold text-sm uppercase px-6 py-2"> Price </th>
                                <th class="font-semibold text-sm uppercase px-6 py-2"> In stock </th>
                                <th class="font-semibold text-sm uppercase px-6 py-2"> </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($pars as $par)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="inline-flex w-15 h-10"> 
                                        <img class='w-15 h-10 object-cover' alt='par Avartar' 
                                        src='{{$par->image ? asset(config('church.storageImageUrl').'products/'.$par->image) : asset('images/blog/no-image.png')}}' /> </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class=""> {{$par->title}}</p>
                                </td>
                                <td class="px-6 py-4 text-center"> {{$par->amount}} </td>
                                <td class="px-6 py-4 text-center"> {{$par->qty}} </td>
                                <td class="px-6 py-4 text-center"> 
                                    @can('is_admin')
                                    <a href="{{route("editparephenial", $par->id)}}" class="text-purple-800 hover:underline">Edit</a> 
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="text-center">No parephenials Yet</div>
                    @endif
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</x-app-layout>

