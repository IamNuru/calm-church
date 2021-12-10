<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mb-4 text-right">
            @can('is_admin')
            <x-jet-nav-link href="{{ route('addpost') }}" class="font-semibold text-xl">
                {{ __('Create New Post') }}
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
                <!-- start -->
                <div class='overflow-x-auto w-full'>
                    @if (count($posts) > 0)
                    <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                        <thead class="bg-gray-900">
                            <tr class="text-white text-left">
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Image </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4"> Title </th>
                                @can('is_admin')
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> status </th>
                                @endcan
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Rank </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($posts as $post)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="inline-flex w-15 h-10"> <img class='w-15 h-10 object-cover' alt='Post Avartar' src='{{$post->image ? asset(config('church.storageImageUrl').'posts/'.$post->image) : asset('images/blog/no-image.png')}}' /> </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class=""> {{$post->title}}</p>
                                </td>
                                @can('is_admin')
                                <td class="px-6 py-4 text-center"> 
                                    <form method="POST" action="{{ route('post.status', $post->id) }}">
                                        @csrf
                                        <a class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full" href="{{ route('post.status', $post->id) }}"
                                                 onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{$post->status ? 'Active' : 'Inactive'}}
                                        </a>
                                    </form>
                                </td>
                                @endcan
                                <td class="px-6 py-4 text-center"> {{$post->rank}} </td>
                                <td class="px-6 py-4 text-center"> 
                                    @can('is_admin')
                                    <a href="{{route("editpost", $post->id)}}" class="text-purple-800 hover:underline">Edit</a> 
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="text-center">No posts Yet</div>
                    @endif
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</x-app-layout>

