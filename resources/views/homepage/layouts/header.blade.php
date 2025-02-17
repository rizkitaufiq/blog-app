<nav class="w-full flex justify-center lg:justify-between min-w-max navbar bg-base-100 shadow-xl mt-2 lg:px-4">
    <div class="hidden lg:flex md:flex">
        <a class="text-secondary font-bold text-xl">BlogKU</a>
    </div>

    <div class="flex justify-center items-center">

        <ul class="menu menu-horizontal lg:px-1 text-[12px] lg:text-base -mx-4 lg:gap-2 font-bold text-default">

            <li><a href="{{ route('homepage') }}">@lang('homepage.home')</a></li>

            <li>
                <details>
                    <summary><i class="bx bx-globe text-sm lg:text-base "></i>@lang('homepage.language')</summary>
                    <ul class="bg-base-100 rounded-t-none p-2 z-20">
                        <li><a href="{{ route('changeLang', ['locale' => 'en']) }}">English</a></li>
                        <li><a href="{{ route('changeLang', ['locale' => 'id']) }}">Indonesia</a></li>
                    </ul>
                </details>
            </li>

            @if (Auth::check())
                <li>
                    <details>
                        <summary><i class="bx bx-user text-sm lg:text-base "></i>{{ Auth::user()->username }}</summary>
                        <ul class="bg-base-100 rounded-t-none p-2 z-20">
                            <li>
                                <form action="{{ route('post') }}" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="bg-warning px-4 py-2 rounded hover:bg-warning">@lang('homepage.posting')</button>
                                </form>
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="bg-warning px-4 py-2 rounded hover:bg-warning">@lang('homepage.logout')</button>
                                </form>
                            </li>
                        </ul>
                    </details>
                </li>
            @else
                <li><a href="{{ route('login') }}">@lang('homepage.login')</a></li>
            @endif

        </ul>
    </div>
</nav>
