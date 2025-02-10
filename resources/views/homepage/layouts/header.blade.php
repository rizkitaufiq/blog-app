<nav class="navbar bg-base-100 shadow-xl mt-2">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl text-primary font-bold">BlogKU</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li><a>Link</a></li>
            <li>
                <details>
                    <summary>Languange</summary>
                    <ul class="bg-base-100 rounded-t-none p-2">
                        <li><a href="{{ route('changeLang', ['locale' => 'en']) }}">English</a></li>
                        <li><a href="{{ route('changeLang', ['locale' => 'id']) }}">Indonesia</a></li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
</nav>
