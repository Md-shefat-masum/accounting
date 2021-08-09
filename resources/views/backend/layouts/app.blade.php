<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <title>Akaunter</title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- Favicon-->
        <link rel="icon" href="{{ asset('backend/assets/images/favicon.ico') }}" type="image/x-icon">
        <!-- Plugins Core Css -->

        <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet">
        <!-- Custom Css -->
        <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />
        <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
        <link href="{{ asset('backend/assets/css/styles/all-themes.css') }}" rel="stylesheet" />

        <!-- all css -->
        <link href="{{ asset('backend/assets/css/styles/all.css') }}" rel="stylesheet" />
        @if(auth()->user())
            <script>
                window.user = {
                    name: "{{ auth()->user()->name }}",
                };
            </script>
        @endif
        <link rel="stylesheet" href="{{ asset('backend/assets/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/printview.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('vue/app.css') }}">
    </head>

    <body class="light">
        <div id="app">
            @yield('content')
        </div>

        <!-- Plugins Js -->
        <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/chart.min.js') }}"></script>
        <!-- Custom Js -->
        <script src="{{ asset('backend/assets/js/admin.js') }}"></script>
        <script src="{{ asset('backend/assets/js/pages/index.js') }}"></script>
        <script src="{{ asset('backend/assets/js/pages/charts/jquery-knob.js') }}"></script>
        <script src="{{ asset('backend/assets/js/pages/sparkline/sparkline-data.js') }}"></script>
        <script src="{{ asset('backend/assets/js/pages/medias/carousel.js') }}"></script>
        <script src="{{ asset('vue/app.js') }}"></script>
        <script src="{{ asset('backend/assets/custom.js') }}"></script>

    </body>
</html>
