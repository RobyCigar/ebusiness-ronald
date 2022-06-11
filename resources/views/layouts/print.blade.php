<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shorcut icon' href="{{ asset('assets/icon.png') }}" type="image/png" >
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KASIRONALD') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/jquery.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200;300;400;500;600;900&display=swap" rel="stylesheet">


    @stack('styles')
</head>

<body>
    <div id="app">
        <main style="overflow: hidden">
            @yield('content')
        </main>
    </div>

    <script>
        $(document).ready(function() {
            $('#logout').click(function() {
                // ajax post request
                $.ajax({
                    type: 'POST',
                    url: "{{ route('api.logout') }}",
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    },
                    data: {
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data) {
                        console.log(data)

                        window.location.href = "{{ route('login') }}";
                    }
                });
            });
        });
    </script>
    @stack('scripts')
</body>

</html>