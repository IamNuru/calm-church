<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- start -->
                <div class='overflow-x-auto w-full'>
                    @if (count($users) > 0)
                    <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                        <thead class="bg-gray-900">
                            <tr class="text-white text-left">
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Designation </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> status </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> role </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="inline-flex w-10 h-10"> 
                                            <img class='w-10 h-10 object-cover rounded-full' 
                                            alt='User avatar' 
                                            src='{{$user->image ? asset(config('church.storageImageUrl').'profile-photos/'.$user->profile_photo_path) : asset('images/person/no-image-avatar.jpeg')}}' /> </div>
                                        <div>
                                            <p> {{$user->name}} </p>
                                            <p class="text-gray-500 text-sm font-semibold tracking-wide"> {{$user->email}} </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="">{{$user->position ? $user->position : '----'}}</p>
                                </td>
                                <td class="px-6 py-4 text-center"> 
                                    <form method="POST" action="{{ route('user.status', $user->id) }}">
                                        @csrf
                                        <a class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full" href="{{ route('user.status', $user->id) }}"
                                                 onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{$user->status ? 'Active' : 'Inactive'}}
                                        </a>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-center"> {{$user->role ? $user->role : ''}} </td>
                                <td class="px-6 py-4 text-center"> 
                                    @can('is_admin')
                                    <a href="{{route("edituser", $user->id)}}" class="text-purple-800 hover:underline">Edit</a> 
                                    @endcan
                                </td>
                        
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    @else
                        <div class="text-center">No users Yet</div>
                    @endif
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</x-app-layout>