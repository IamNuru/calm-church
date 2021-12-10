<div class="">
    <x-jet-label for="category" value="{{ __('category') }}" />
    <select name="category" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
        @if (count($categories) > 0)
        @foreach ($categories as $key => $value)
        <option value="{{$value->id}}" selected="{{$cat_id === $value->category_id}}">{{$value->name}}</option>
        @endforeach
        @else
        <option value="">No Category</option>
        @endif
    </select>
</div>