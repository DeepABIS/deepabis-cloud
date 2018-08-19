<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/app.css">

    <title>Laravel</title>

</head>
<body class="app sidebar-md-show">
<script type="text/javascript" src="/js/app.js" defer></script>
<header class="app-header navbar navbar-light">
    <a class="navbar-brand" href="{{ route('dashboard.index') }}">ABIS</a>
    <button class="navbar-toggler sidebar-toggler d-md-none ml-4" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto mr-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" onclick="$(this).next().submit()" href="#">Action</a>
                <form action="{{ route('logout') }}" method="post" style="display: inline">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</header>
<div class="app-body">
    <div class="sidebar">
        @include('console.sidenav')
    </div>
    <main class="main" id="app">
        <!-- Main content here -->
        <div class="container-fluid mt-3 mb-3">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
