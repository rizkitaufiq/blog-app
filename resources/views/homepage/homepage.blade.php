@extends('homepage.layouts.app')

@section('content')
    <div>
        <section class="w-full -mt-4 mb-4 lg:mb-10">
            @include('homepage.hero')
        </section>

        <main class="mb-2 lg:mb-5">
            <div class="w-full flex flex-column gap-4 text-[8px] lg:text-sm">
                <div class="w-[60%]">
                    <div class="flex justify-center items-center min-w-full border border-b-gray-300 p-2 lg:p-8">
                        <div>
                            <article class="card bg-base-100 w-full">
                                <figure>
                                    <img src="images/homepage/content/traveling-5.jpg" alt="image" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title text-[12px] lg:text-xl">
                                        Title
                                        <div class="h-[2vh] lg:h-[3vh] badge bg-danger text-white text-[6px] lg:text-sm">
                                            Latepost</div>
                                    </h2>
                                    <p class="mb-4 text-black text-justify">I'm happy for traveling in bali beach,
                                        wonderfull island and
                                        strong cultural <a href="" class="text-primary">Read More...</a></p>
                                    <div class="flex gap-2 justify-end">
                                        <div
                                            class="w-[4vh] lg:w-auto h-[2vh] lg:h-full text-[8px] lg:text-sm lowercase hover:text-white hover:bg-primary badge badge-outline ">
                                            <a href="">@lang('homepage.like')</a>
                                        </div>
                                        <div
                                            class="w-[7vh] lg:w-auto h-[2vh] lg:h-full text-[8px] lg:text-sm lowercase hover:text-white hover:bg-primary badge badge-outline">
                                            <a href="">@lang('homepage.comment')</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <aside class="w-[40%]">
                    <section class="mb-4 lg:mb-6">
                        <div class="border-gray-300 border-b-2">
                            <h1>Best viewers</h1>
                        </div>

                        <div class="mt-2">
                            <h2>First Posting</h2>
                            <div class="text-black">
                                <p class="text-justify">My first posting on February 2025 <a href=""
                                        class="text-primary">Read More...</a>
                                </p>
                            </div>
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
                    </section>

                    <section class="mb-4 lg:mb-6">
                        <div class="border-gray-300 border-b-2">
                            <h1>Favorite</h1>
                        </div>

                        <div class="mt-2">
                            <h2>First Posting</h2>
                            <div class="text-black">
                                <p class="text-justify">My first posting on February 2025 <a href=""
                                        class="text-primary">Read More...</a>
                                </p>
                            </div>
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
                    </section>
                </aside>

            </div>
        </main>
    </div>
@endsection
