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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200;300;400;500;600;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    <div id="app">
        <nav style="background-color:hsl(216, 100%, 14%); height:58px;" class="navbar navbar-expand-md navbar-dark shadow">
            <div class="container">
                @if(url()->current() == route('register') || url()->current() == route('login'))
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    {{ config('app.name', 'Kasironald') }}
                </a>
                @endif
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon">
                    </span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto text-light">
                        @if(url()->current() !== route('login') && url()->current() !== route('register'))
                        <li class="nav-item" style="cursor: pointer;">
                            <div id="logout" style="width:66px;">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                Logout
                            </div>
                        </li>
                        @endif
                        <!-- Authentication Links -->
                        @guest

                        <!-- If user are in login page, show link to register page -->
                        @if (url()->current() == route('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        <!-- If user are in register page, show link to login page -->
                        @if (url()->current() == route('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

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