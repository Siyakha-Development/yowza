<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('backend/css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}" />

    <!-- Javascript Assets -->
    <script src="{{asset('backend/js/app.js')}}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

</head>

<body>
    <div id="app">
        <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900">
            <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
                <a href="#" class="flex items-center space-x-2">
                    <img class="size-12" src="https://yowza.co.za/images/Logo/April-2024/yowza-logo-mark-1.png"
                        alt="logo">
                    {{-- <p class="text-xl font-semibold uppercase text-slate-700 dark:text-navy-100">
                        lineone
                    </p> --}}
                </a>
            </div>
            <div class="hidden w-full place-items-center lg:grid">
                <div class="w-full max-w-lg p-6">
                    <img class="w-full" x-show="!$store.global.isDarkModeEnabled"
                        src="https://yowza.co.za/images/2023/11/17/shutterstock_137778674.jpg" alt="image">
                    <img class="w-full" x-show="$store.global.isDarkModeEnabled"
                        src="images/illustrations/dashboard-meet-dark.svg" alt="image" style="display: none;">
                </div>
            </div>

            <main class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
