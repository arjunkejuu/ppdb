<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PAUD Bunga Pandan') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    {{-- Datepicker --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
    
    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.css">
    
</head>
<body>
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                    @if (Route::has('login'))
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="60px">
                        </a>
                    @endif
                @else
                    <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="" height="60px">
                    </a>
                @endguest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto text-center">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">BERANDA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/pdb') }}">PENDAFTARAN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/status-pendaftaran') }}">STATUS PENDAFTARAN</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">DASHBOARD</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
        
        <footer class="footer mt-auto py-3">
            <div class="container text-center">
                <span class="footer-text">© {{ date('Y') }} Arjun Surya Atmaja</span>
            </div>
        </footer>
    </div>
    
    @stack('scripts')
    
</body>
</html>
