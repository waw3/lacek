<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Lacek - Bootstrap 5 Admin Template &amp; UI Framework</title>

    <meta name="description" content="Lacek - Bootstrap 5 Admin Template &amp; UI Framework created by waw3">
    <meta name="author" content="waw3">
    <meta name="robots" content="noindex, nofollow">

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <!-- Modules -->
    @vite(['resources/sass/main.scss', 'resources/sass/lacek/themes/xplay.scss'])
    @stack('css')
    <!-- Alternatively, you can also include a specific color theme after the main stylesheet to alter the default color theme of the template -->
    {{-- @vite(['resources/sass/main.scss', 'resources/sass/lacek/themes/xplay.scss', 'resources/js/lacek/app.js']) --}}

</head>

<body>
    <!-- Page Container -->
    <div id="page-container">
        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="/assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    @vite(['resources/js/lacek/app.js'])



    @stack('js')
</body>

</html>
