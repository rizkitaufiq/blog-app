<section>
    <div class="w-full">
        <h1 class="text-center text-[12px] lg:text-xl mb-2 lg:mb-4">@lang('postPage.my_post')</h1>

        @if ($posts->count())
            @foreach ($posts as $post)
                <div
                    class="flex justify-center items-center -right-10 min-w-full border border-b-gray-300 p-2 lg:p-8 mb-2 lg:mb-4">
                    <div>
                        <div class="flex justify-end dropdown dropdown-bottom dropdown-end mb-2 lg:mb-8">
                            <div tabindex="0" role="button" class="btn m-1 font-bold">:</div>
                            <ul tabindex="0"
                                class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">

                                <li>
                                    <a href="{{ route('post.update', $post->id) }}"><i
                                            class="bx bx-pencil text-sm lg:text-base "></i>
                                        @lang('postPage.update')</a>
                                </li>

                                <li>
                                    <button onclick="confirmDelete({{ $post->id }})" type="submit"
                                        class="text-danger"><i class="bx bx-trash text-sm lg:text-base mr-1"></i>
                                        @lang('postPage.delete')</button>
                                    <form id="delete-form-{{ $post->id }}" class="hidden"
                                        action="{{ route('post.delete', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </li>

                            </ul>
                        </div>

                        <article class="card bg-base-100 w-full">

                            <figure>
                                <img src="{{ asset('upload/posts/' . $post->image) }}" alt="image"
                                    class="w-[40vh] lg:w-[150vh]" />
                            </figure>

                            <div class="card-body">
                                <h2 class="card-title text-[12px] lg:text-xl">
                                    {{ $post->title }}
                                    <div class="h-[2vh] lg:h-[3vh] badge bg-danger text-white text-[6px] lg:text-sm">
                                        {{ $post->updated_at->format('Y-m-d') }}</div>
                                </h2>
                                <p class="text-[8px] lg:text-sm mb-4 text-black text-justify"> {{ $post->content }}</p>
                                <div class="flex gap-2 justify-end">

                                    {{-- <div
                                        class="w-[4vh] lg:w-auto h-[2vh] lg:h-full text-[8px] lg:text-sm lowercase hover:text-white hover:bg-primary badge badge-outline ">
                                        <a href="">@lang('postPage.like')</a>
                                    </div> --}}

                                    <div
                                        class="w-[7vh] lg:w-auto h-[2vh] lg:h-full text-[8px] lg:text-sm lowercase hover:text-white hover:bg-primary badge badge-outline">
                                        <a href="javascript:void(0);"
                                            onclick="toggleComment({{ $post->id }})">@lang('postPage.comment') <i
                                                class="rounded-full text-danger font-bold">
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

            <div class="d-flex justify-center mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-center mb-2 lg:mb-4">@lang('postPage.not_posts_yet')</p>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(postId) {
            Swal.fire({
                title: "Are you sure want to delete ?",
                text: "Deleted data cannot be restored !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#73C7C7",
                cancelButtonColor: "#FB9EC6",
                confirmButtonText: "Yes, Delete it",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("delete-form-" + postId).submit();
                }
            });
        }
    </script>
</section>
