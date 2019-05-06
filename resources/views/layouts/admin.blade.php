<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ユニプラ商社') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>body{background-color: tomato;}</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-dark text-white">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'ユニプラ商社') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if(Auth::guard('admin')->check())
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                                  </a>

                              &lt;div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"&gt;
                                  &lt;a class="dropdown-item" href="{{ route('admin.logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();"&gt;
                                      {{ __('Logout') }}
                                  &lt;/a&gt;

                                  &lt;form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;"&gt;
                                      @csrf
                                  &lt;/form&gt;
                              &lt;/div&gt;
                          &lt;/li&gt;


                          @else
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.login') }}">{{ _('Login') }}</a>
                              </li>
                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('admin.register') }}">{{ _('Register') }}</a>
                                  </li>
                              @endif
                          @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
