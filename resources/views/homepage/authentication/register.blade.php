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

            <form class="card-body" method="POST" action={{ route('register.process') }}>
                @csrf
                <div class="form-control -mb-2 lg:mb-0">
                    <label for="username" class="label">
                        <span class="text-primary label-text text-[8px] lg:text-sm">@lang('registerPage.username')</span>
                    </label>

                    <input id="username" name="username" type="text"
                        placeholder="{{ strtolower(__('registerPage.username')) }}"
                        class="h-[4vh] lg:h-[6vh] input input-bordered text-[8px] lg:text-sm -mt-2 lg:mt-0"
                        value="{{ old('username') }}" autocomplete="username" />

                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <div class="form-control -mb-2 lg:mb-0">
                    <label for="email" class="label">
                        <span class="text-primary label-text text-[8px] lg:text-sm">@lang('registerPage.email')</span>
                    </label>

                    <input id="email" name="email" type="text"
                        placeholder="{{ strtolower(__('registerPage.email')) }}"
                        class="h-[4vh] lg:h-[6vh] input input-bordered text-[8px] lg:text-sm -mt-2 lg:mt-0"
                        value="{{ old('email') }}" autocomplete="email" />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-control -mb-2 lg:mb-0">
                    <label for="password" class="label">
                        <span class="text-primary label-text text-[8px] lg:text-sm">@lang('registerPage.password')</span>
                    </label>

                    <input id="password" name="password" type="password"
                        placeholder="{{ strtolower(__('registerPage.password')) }}"
                        class="h-[4vh] lg:h-[6vh] input input-bordered text-[8px] lg:text-sm -mt-2 lg:mt-0"
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="form-control -mb-2 lg:mb-0">
                    <label for="confirmPassword" class="label">
                        <span class="text-primary label-text text-[8px] lg:text-sm">@lang('registerPage.confirm_password')</span>
                    </label>

                    <input id="confirmPassword" type="password"
                        placeholder="{{ strtolower(__('registerPage.confirm_password')) }}" name="password_confirmation"
                        class="h-[4vh] lg:h-[6vh] input input-bordered text-[8px] lg:text-sm -mt-2 lg:mt-0"
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    <div class="flex mt-1 lg:mt-3">
                        <p class="text-[8px] lg:text-sm">@lang('registerPage.already_have_an_account')
                            <a href="{{ route('login') }}"
                                class="text-primary text-[8px] lg:text-sm font-bold label-text-alt link link-hover">
                                @lang('registerPage.login')</a>
                        </p>
                    </div>
                </div>

                <div class="form-control mt-2 lg:mt-5">
                    <button
                        class="h-[3vh] lg:h-[6vh] bg-primary rounded-[5px] hover:bg-gray-400 text-white text-[8px] lg:text-sm">@lang('registerPage.register')</button>
                </div>
            </form>

            <figure>
                <img src="images/homepage/content/traveling-5.jpg" alt="image"
                    class="w-[150px] lg:w-[300px] h-full " />
            </figure>
        </section>
    </main>

</body>

</html>
