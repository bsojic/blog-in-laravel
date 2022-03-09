<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts project</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">{{ __('Home') }}</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="#" class="p-3">Posts</a>
            </li>
            @php $locale = session()->get('locale'); @endphp
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @switch($locale)
                        @case('en')
                        <img src="{{asset('images/flag/en.png')}}" width="25px"> English
                        @break
                        @case('sr')
                        <img src="{{asset('images/flag/sr.png')}}" width="25px"> Serbian
                        @break
                        @default
                        <img src="{{asset('images/flag/en.png')}}" width="25px"> English
                    @endswitch
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="lang/en"><img src="{{asset('images/flag/en.png')}}" width="25px"> English</a>
                    <a class="dropdown-item" href="lang/sr"><img src="{{asset('images/flag/sr.png')}}" width="25px"> Serbian</a>
                </div>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth

            <li>
                <a href="#" class="p-3">{{ auth()->user()->name }}</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="p-3 inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>

            @endauth
            @guest
              
            <li>
                <a href="{{ route('login.form') }}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Register</a>
            </li>

            @endguest    
        </ul>
    </nav>

    @yield('content')

</body>
</html>