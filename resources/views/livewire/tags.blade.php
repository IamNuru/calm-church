<div class="">
    <x-jet-label for="tag" value="{{ __('Tag') }}" />
    <select name="tags" id="tags" multiple="multiple" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
        @if (count($tags) > 0)
        @foreach ($tags as $key => $value)
        <option value="{{$value->id}}">{{$value->name}}</option>
        @endforeach
        @else
        <option value="">No Tag</option>
        @endif
    </select>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{asset('select2/dist/js/select2.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        /* $('.ckeditor').ckeditor(); */
        $('#tags').select2();
    });
</script>