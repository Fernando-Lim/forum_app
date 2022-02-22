<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Forum
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">

                    @guest
                        <div class="col-md-12">
                            @yield('content')
                        </div>
                        @yield('script')
                    @else
                        @if (Carbon\Carbon::parse(Auth::user()->updated_at)->format('H:i:s') != Carbon\Carbon::parse(Auth::user()->created_at)->format('H:i:s'))
                            <div class="container">

                            </div>
                            <div class="col-md-2">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        href="{{ url('/home') }}" role="tab" aria-controls="list-messages">Home</a>
                                    <a class="list-group-item list-group-item-action disabled active" id="list-profile-list"
                                        data-bs-toggle="list" href="#list-profile" role="tab"
                                        aria-controls="list-profile">Staff</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        href="{{ route('user.create') }}" role="tab"
                                        aria-controls="list-messages">Pendaftaran
                                        Staff</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        href="{{ route('user.index') }}" role="tab"
                                        aria-controls="list-messages">Edit Staff</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        data-bs-toggle="collapse" data-bs-target="#testing" href="#list-messages" role="tab"
                                        aria-controls="list-messages">Testing Dropdown</a>
                                    <div class="collapse" id="testing">
                                        
                                        <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        href="#list-settings" role="tab"
                                        aria-controls="list-messages">Item 1</a>
                                        
                                    </div>
                                    <a class="list-group-item list-group-item-action disabled active"
                                        id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab"
                                        aria-controls="list-settings">Divisi</a>
                                </div>
                            </div>

                            <div class="col-md-10">
                                @yield('content')
                            </div>
                            @yield('script')
                        @endif


                        @if (Carbon\Carbon::parse(Auth::user()->updated_at)->format('H:i:s') == Carbon\Carbon::parse(Auth::user()->created_at)->format('H:i:s'))
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                            @yield('script')
                        @endif





                    @endguest

                </div>


            </div>

        </main>

    </div>
</body>

</html>
