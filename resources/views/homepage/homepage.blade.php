@extends('homepage.layouts.app')

@section('content')
    <div>
        <section class="w-full -mt-4 mb-4 lg:mb-10">
            @include('homepage.hero')
        </section>

        <main class="mb-2 lg:mb-5">
            <div class="w-full flex flex-column gap-4 text-[8px] lg:text-sm">
                <div class="w-[50%]">

                    <form action="{{ route('homepage') }}" method="GET" class="flex items-center gap-2 lg:gap-8">
                        <div class="form-control mb-2 lg:mb-4">
                            <input name="search" value="{{ request('search') }}" type="text"
                                placeholder="@lang('homepage.search')"
                                class="input input-bordered w-20 lg:w-auto h-[20px] lg:h-[45px] text-[8px] lg:text-base" />
                        </div>

                        <div>
                            <ul
                                class="menu menu-horizontal lg:px-1 text-[12px] lg:text-base -mx-4 lg:gap-2 font-bold text-default">
                                <li>
                                    <details>
                                        <summary><i class="bx bx-filter text-[8px] lg:text-base "></i>@lang('homepage.filter')
                                        </summary>
                                        <ul
                                            class="bg-base-100 rounded-t-none p-0 lg:p-2 z-20 text-[8px] lg:text-sm w-[15vh] lg:w-[30vh]">

                                            <li><a href="{{ route('homepage', array_merge(request()->query(), ['sort' => 'latest'])) }}"
                                                    class="{{ request('sort', 'latest') === 'latest' ? 'bg-primary text-white' : '' }}">@lang('homepage.latest_post')</a>
                                            </li>

                                            <li><a href="{{ route('homepage', array_merge(request()->query(), ['sort' => 'oldest'])) }}"
                                                    class="{{ request('sort') === 'oldest' ? 'bg-primary text-white' : '' }}">@lang('homepage.oldest_post')</a>
                                            </li>
                                        </ul>
                                    </details>
                                </li>
                            </ul>
                        </div>
                    </form>


                    @if ($posts->count())
                        @foreach ($posts as $post)
                            <div
                                class="flex justify-center items-center min-w-full border border-b-gray-300 p-2 lg:p-8 mb-2 lg:mb-4">
                                <div>
                                    <article class="card bg-base-100 w-full">
                                        <figure>
                                            <img src="{{ asset('upload/posts/' . $post->image) }}" alt="image" />
                                        </figure>

                                        <div class="mt-2 lg:mt-6">

                                            <div class="flex justify-between item-center">
                                                <div>
                                                    <h2 class="flex card-title text-[8px] lg:text-xl">
                                                        {{ $post->title }}
                                                    </h2>
                                                </div>

                                                <div
                                                    class="h-[2vh] lg:h-[3vh] badge bg-danger text-white text-[6px] lg:text-sm mt-2">
                                                    {{ $post->updated_at->format('Y-m-d') }}
                                                </div>
                                            </div>

                                            <p class="mb-2 text-black text-justify">{{ $post->content }}</p>

                                            <p class="text-primary"><i class="bx bx-share text-sm lg:text-base "></i>
                                                {{ $post->user->username }}</p>

                                            <div class="flex gap-2 justify-end">

                                                {{-- <div
                                                    class="w-[4vh] lg:w-auto h-[2vh] lg:h-full text-[8px] lg:text-sm lowercase hover:text-white hover:bg-primary badge badge-outline ">
                                                    <a href="">@lang('homepage.like')</a>
                                                </div> --}}

                                                <div
                                                    class="w-[7vh] lg:w-auto h-[2vh] lg:h-full text-[8px] lg:text-sm lowercase hover:text-white hover:bg-primary badge badge-outline">
                                                    <a href="javascript:void(0);"
                                                        onclick="toggleComment({{ $post->id }})">
                                                        @lang('homepage.comment')<i class="rounded-full text-danger font-bold">
                                                            {{ $post->comments->count() }}</i></a>
                                                </div>
                                            </div>

                                            <div id="comment-section-{{ $post->id }}" class="hidden mt-2">

                                                <form action="{{ route('comment') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                                                    <textarea name="content" rows="2" class="w-full border p-2 rounded-md mt-2 lg:mt-4"
                                                        placeholder="@lang('homepage.write_comment')"></textarea>

                                                    <button type="submit"
                                                        class="mt-2 px-4 py-2 bg-primary text-white rounded-md">@lang('homepage.send')</button>
                                                </form>

                                                <section class="mt-4">
                                                    @include('homepage.comment')
                                                </section>
                                            </div>

                                        </div>
                                    </article>
                                </div>
                            </div>
                        @endforeach

                        <div class="text-[8px] lg:text-sm w-[2vh] lg:w-full d-flex justify-center mt-4">
                            {{ $posts->appends(['latestPage' => request('latestPage'), 'oldestPage' => request('oldestPage')])->links() }}
                        </div>
                    @else
                        <p class="text-center mb-2 lg:mb-4">@lang('homepage.not_posts_yet')</p>
                    @endif

                </div>

                <aside class="w-[40%]">
                    @include('homepage.aside')
                </aside>

            </div>

        </main>
    </div>
@endsection
