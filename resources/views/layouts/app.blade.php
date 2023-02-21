<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Lacek Group</title>

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
    @stack('css')
    @vite(['resources/sass/main.scss', 'resources/sass/lacek/themes/xplay.scss'])
</head>

<body>

    <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
        <!-- Side Overlay-->
        @include('layouts.side-overlay')
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        @include('layouts.nav-sidebar')
        <!-- END Sidebar -->

        <!-- Header -->
        @include('layouts.header')
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        @include('layouts.footer')
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->
    <script src="/assets/js/lib/jquery.min.js"></script>
    @vite(['resources/js/lacek/app.js'])
    @stack('js')
</body>

</html>
