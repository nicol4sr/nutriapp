<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nutriapp / @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/images/icons/icon.png') }}" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/plugins/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/plugins/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/plugins/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('/plugins/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('/plugins/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/reloj.css') }}" rel="stylesheet">

    @yield('css')

    <!-- Template Main CSS File -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    @laravelPWA
</head>

<body>
    @if (Auth::check())
        <x-nav />
        <x-aside />
        <main id="main" class="main">
            @yield('content')
        </main>
        <x-footer />
    @else
        <main class="container">
            @yield('content')
        </main>
    @endif

    <!-- Vendor JS Files -->

    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('/plugins/quill/quill.min.js') }}"></script>
    <script src="{{ asset('/plugins/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/js/reloj.js') }}"></script>

    @yield('js')

    <!-- Template Main JS File -->
    <script src="{{ asset('/js/main.js') }}"></script>
</body>

</html>
