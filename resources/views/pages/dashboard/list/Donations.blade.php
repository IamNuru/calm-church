<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donations') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4 text-right">
            @can('is_admin')
            <x-jet-nav-link href="{{ route('adddonation') }}" class="font-semibold text-xl">
                {{ __('Create New Donation') }}
            </x-jet-nav-link>
            @endcan
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- start -->
                @if(session()->has('success'))
                <div class="w-full text-center text-purple-800 text-md">
                    {{ session()->get('success') }}
                </div>
                @endif
                <div class='overflow-x-auto w-full'>
                    @if (count($donations) > 0)
                    <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                        <thead class="bg-gray-900">
                            <tr class="text-white text-left">
                                <th class="font-semibold text-sm uppercase px-6 py-2"> Image </th>
                                <th class="font-semibold text-sm uppercase px-6 py-2"> Title </th>
                                <th class="font-semibold text-sm uppercase px-6 py-2 text-center"> status </th>
                                <th class="font-semibold text-sm uppercase px-6 py-2 text-center"> Amount </th>
                                <th class="font-semibold text-sm uppercase px-6 py-2 text-center"> Amount Raised </th>
                                <th class="font-semibold text-sm uppercase px-6 py-2"> </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($donations as $donation)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="inline-flex w-15 h-10"> 
                                        <img class='w-15 h-10 object-cover' alt='Donation avatar' 
                                        src='{{$donation->image ? asset(config('church.storageImageUrl').'donations/'.$donation->image) : asset('images/blog/donation.jpg')}}' /> </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class=""> {{$donation->title}}</p>
                                </td>
                                <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> {{$donation->amount_raised > $donation->amount ? 'Exceeded' : 'Not Exceeded'}} </span> </td>
                                <td class="px-6 py-4 text-center"> {{$donation->amount}} </td>
                                <td class="px-6 py-4 text-center"> {{$donation->amount_raised}} </td>
                                <td class="px-6 py-4 text-center"> 
                                    @can('is_admin')
                                    <a href="{{route("editdonation", $donation->id)}}" class="text-purple-800 hover:underline">Edit</a> 
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center">No donations yet</div>
                    @endif
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</x-app-layout>

