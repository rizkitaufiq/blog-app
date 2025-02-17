@foreach ($post->comments as $comment)
    <div class="chat chat-end">
        <div class="chat-header">
            {{ $comment->user->username }}
            <time class="text-xs opacity-50">
                {{ \Carbon\Carbon::parse($comment->updated_at)->format('H:i:s') }}</time>
        </div>
        <div class="bg-primary chat-bubble text-white">
            {{ $comment->content }}
        </div>


        @if ($comment->replies)
            <div class="ml-4 mt-2 p-2 border rounded-md bg-gray-100">
                <p class="text-sm"><strong>{{ $comment->replies->user->username }}</strong>:
                    {{ $comment->replies->content }}
                </p>
            </div>
        @endif

        <div>
            @if (!$comment->replies)
                <form action="{{ route('comment') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                    <textarea name="content" rows="2" class="w-full border p-2 rounded-md mt-10" placeholder="@lang('comment.replay_this_comment')"></textarea>

                    <button type="submit" class="mt-2 px-4 py-2 bg-primary text-white rounded-md">
                        @lang('comment.replay')
                    </button>
                </form>
            @endif
        </div>
    </div>
@endforeach
