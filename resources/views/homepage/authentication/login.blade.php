<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BlogKU') }}</title>
</head>

<body>
    <main class="hero bg-base-200 min-h-screen">
        <section class="card card-side bg-base-100 shadow-xl lg:flex-row">
            <figure>
                <img src="images/homepage/content/traveling-1.avif" alt="image"
                    class="w-[150px] lg:w-[300px] h-[300px] lg:h-[450px] " />
            </figure>

            <form class="card-body" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-control -mb-2 lg:mb-0">
                    <label for="email" class="label">
                        <span class="text-primary label-text text-[8px] lg:text-sm">@lang('loginPage.email')</span>
                    </label>

                    <input id="email" name="email" type="email"
                        placeholder="{{ strtolower(__('loginPage.email')) }}" name="email" value="{{ old('email') }}"
                        class="h-[4vh] lg:h-[6vh] input input-bordered text-[8px] lg:text-sm -mt-2 lg:mt-0" />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-control -mb-2 lg:mb-0">
                    <label for="password" class="label">
                        <span class="text-primary label-text text-[8px] lg:text-sm">@lang('loginPage.password')</span>
                    </label>

                    <input id="password" name="password" type="password"
                        placeholder="{{ strtolower(__('loginPage.password')) }}" name="password"
                        value="{{ old('password') }}"
                        class="h-[4vh] lg:h-[6vh] input input-bordered text-[8px] lg:text-sm -mt-2 lg:mt-0" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <div class="flex mt-1 lg:mt-3">
                        <p class="text-[8px] lg:text-sm">@lang('loginPage.dont_have_account')
                            <a href="{{ route('register') }}"
                                class="text-primary text-[8px] lg:text-sm font-bold label-text-alt link link-hover">
                                @lang('loginPage.create_account')</a>
                        </p>
                    </div>
                </div>
                <div class="form-control mt-2 lg:mt-5">
                    <button
                        class="h-[3vh] lg:h-[6vh] bg-primary rounded-[5px] hover:bg-gray-400 text-white text-[8px] lg:text-sm">@lang('loginPage.login')</button>
                </div>
            </form>
        </section>
    </main>


    <script>
        window.sessionSuccess = @json(session('success'));
        window.sessionError = @json(session('error'));
    </script>

    @vite(['resources/js/app.js'])

    {{-- <script>
        let token = "{{ session('jwt_token') }}";
        if (token) {
            console.log("Token JWT:", token);
        }
    </script> --}}

</body>

</html>
