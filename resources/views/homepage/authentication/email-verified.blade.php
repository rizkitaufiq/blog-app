<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'BlogKU') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <h1 class="text-2xl font-bold text-success">✅ @lang('emailVerifiedPage.email_success')</h1>
        <p class="text-gray-500 mt-2">@lang('emailVerifiedPage.status_account_verified')</p>

        <a href="{{ route('login') }}"
            class="mt-4 inline-block px-6 py-3 text-white bg-primary rounded-lg hover:bg-default">
            @lang('emailVerifiedPage.login_to_your_account')
        </a>

        <p class="text-gray-400 text-sm mt-3">@lang('emailVerifiedPage.thanks_for_registering')</p>
    </div>

</body>

</html>
