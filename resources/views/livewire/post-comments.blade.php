<div class="blog-post-item">
    @if (count($comments) > 0)
    <div class="">
      <h3>Comments&nbsp;<span class="text-pink-300 font-semibold">{{$comments->total()}}</span></h3>
      @foreach ($comments as $comment)
      <div class="rounded-xl border border-gray-200 py-4 px-2 my-3 hover:bg-gray-100">
        <div class="">
          <span class="font-semibold text-xl text-gray-600">{{$comment->username}}</span>
          <span class="text-sm px-4">{{$comment->created_at->diffForHumans()}}</span>
        </div>
        <div class="border-b border-gray-200 my-2"></div>
        <div class="">
          <div class="text-md">{{$comment->message}}</div>
        </div>
      </div>
      @endforeach
      {{$comments->links()}}
    </div>
    @else
        <div class="text-center">No comments yets</div>
    @endif
  </div>