<section class="mb-4 lg:mb-6">
    <div class="border-gray-300 border-b-2">
        <h1>@lang('homepage.latest_post')</h1>
    </div>

    @if ($posts->count())
        @foreach ($latestPosts as $post)
            <div class="mt-2">
                <h2>{{ $post->title }}</h2>

                <div class="flex flex-col gap-2 text-black">
                    <div>
                        <p class="text-justify">{{ $post->content }}
                    </div>

                    <div>
                        <p href="" class="text-primary">{{ $post->updated_at }}</p>
                    </div>
                    </p>
                </div>

                <p class="text-primary"><i class="bx bx-share text-sm lg:text-base "></i>
                    {{ $post->user->username }}</p>

                <div class="flex gap-1 lg:gap-2 justify-end mt-3">
                    <div
                        class="w-[4vh] lg:w-auto h-[2vh] lg:h-full text-[8px] lg:text-sm lowercase hover:text-white hover:bg-default badge badge-outline ">
                        <a href="">@lang('homepage.like')</a>
                    </div>
                    <div
                        class="w-[7vh] lg:w-auto h-[2vh] lg:h-full text-[8px] lg:text-sm lowercase hover:text-white hover:bg-primary badge badge-outline">
                        <a href="">@lang('homepage.comment')</a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="text-[8px] lg:text-sm w-[2vh] lg:w-full d-flex justify-center mt-4">
            {{ $latestPosts->appends(['oldestPage' => request('oldestPage')])->links() }}
        </div>
    @else
        <p class="text-center mb-2 lg:mb-4">@lang('homepage.not_posts_yet')</p>
    @endif
</section>

<section class="mb-4 lg:mb-6">
    <div class="border-gray-300 border-b-2">
        <h1>@lang('homepage.oldest_post')</h1>
    </div>

    @if ($posts->count())
        @foreach ($oldestPosts as $post)
            <div class="mt-2">
                <h2>{{ $post->title }}</h2>

                <div class="flex flex-col gap-2 text-black">
                    <div>
                        <p class="text-justify">{{ $post->content }}
                    </div>

                    <div>
                        <p href="" class="text-primary">{{ $post->updated_at }}</p>
                    </div>
                    </p>
                </div>

                <p class="text-primary"><i class="bx bx-share text-sm lg:text-base "></i>
                    {{ $post->user->username }}</p>

                <div class="flex gap-1 lg:gap-2 justify-end mt-3">
                    <div
                        class="w-[4vh] lg:w-auto h-[2vh] lg:h-full text-[8px] lg:text-sm lowercase hover:text-white hover:bg-default badge badge-outline ">
                        <a href="">@lang('homepage.like')</a>
                    </div>
                    <div
                        class="w-[7vh] lg:w-auto h-[2vh] lg:h-full text-[8px] lg:text-sm lowercase hover:text-white hover:bg-primary badge badge-outline">
                        <a href="">@lang('homepage.comment')</a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="text-[8px] lg:text-sm w-[2vh] lg:w-full d-flex justify-center mt-4">
            {{ $oldestPosts->appends(['latestPage' => request('latestPage')])->links() }}
        </div>
    @else
        <p class="text-center mb-2 lg:mb-4">@lang('homepage.not_posts_yet')</p>
    @endif

</section>
