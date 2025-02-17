@extends('homepage.layouts.app')

@section('content')
    <div class="flex flex-col w-full">

        <div class="container mx-auto mt-4 lg:mt-8">
            <section class="p-6 rounded shadow-xl lg:mb-4 text-[8px] lg:text-sm">
                <h2 class="text-[12px] lg:text-xl text-center font-semibold mb-4">@lang('postPage.what_do_you_think')</h2>
                <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-primary font-medium">@lang('postPage.title')</label>
                        <input type="text" id="title" name="title"
                            class="border-2 border-gray-300 w-full p-2 rounded-md shadow-sm" value="{{ old('title') }}">

                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-primary font-medium">@lang('postPage.content')</label>
                        <textarea type="text" id="content" name="content"
                            class="border-2 border-gray-300 lg:h-[30vh] w-full p-2 rounded-md shadow-sm" value="{{ old('content') }}"></textarea>

                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <input type="file" name="image"
                            class="file-input file-input-bordered file:bg-primary hover:file:bg-default file:text-white file:border-none file:px-4 file:py-2 file:rounded-lg file:cursor-pointer text-[8px] lg:text-sm text-black w-3/4 sm:w-2/3 md:w-1/2 lg:w-full max-w-xs">
                    </div>

                    <button type="submit"
                        class="bg-primary hover:bg-default text-white px-4 py-2 rounded-md">@lang('postPage.publish')</button>
                </form>
            </section>
        </div>

        <div class="container mx-auto mt-4 lg:mt-8">
            @include('homepage.post.postList')
        </div>
    </div>
@endsection
