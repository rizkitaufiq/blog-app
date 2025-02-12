<nav class="w-full flex justify-center lg:justify-between min-w-max navbar bg-base-100 shadow-xl mt-2 lg:px-4">
    <div class="hidden lg:flex md:flex">
        <a class="text-secondary font-bold text-xl">BlogKU</a>
    </div>
    <div class="flex justify-center items-center">
        <ul class="menu menu-horizontal px-1 text-[12px] lg:text-base lg:gap-2 font-bold text-default">

            <div class="form-control">
                <input name="search" type="text" placeholder="@lang('homepage.search')"
                    class="input input-bordered w-20 lg:w-auto h-[35px] lg:h-[40px] text-[12px] lg:text-base" />
            </div>

            <li><a>@lang('homepage.home')</a></li>

            <li>
                <details>
                    <summary><i class="bx bx-globe text-sm lg:text-base "></i>@lang('homepage.language')</summary>
                    <ul class="bg-base-100 rounded-t-none p-2 z-20">
                        <li><a href="{{ route('changeLang', ['locale' => 'en']) }}">English</a></li>
                        <li><a href="{{ route('changeLang', ['locale' => 'id']) }}">Indonesia</a></li>
                    </ul>
                </details>
            </li>

            <li><a>@lang('homepage.login')</a></li>

        </ul>
    </div>
</nav>
