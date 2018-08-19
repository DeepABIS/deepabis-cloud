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
<body class="app">
@include('console.sidenav')
<div class="page-container">
    <header class="header navbar">
        <div class="header-container">
            <ul class="nav-left">
                <li>
                    <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                        <i class="ti-menu"></i>
                    </a>
                </li>
                <li class="search-box">
                    <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                        <i class="search-icon ti-search pdd-right-10"></i>
                        <i class="search-icon-close ti-close pdd-right-10"></i>
                    </a>
                </li>
                <li class="search-input">
                    <input class="form-control" type="text" placeholder="Search...">
                </li>
            </ul>
            <ul class="nav-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                        <div class="peer mR-10">
                            <img class="w-2r bdrs-50p" src="http://via.placeholder.com/50x50" alt="">
                        </div>
                        <div class="peer">
                            <span class="fsz-sm c-grey-900">{{ \Auth::user()->name }}</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu fsz-sm">
                        <li>
                            <a href="#" onclick="$(this).next().submit()" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                                <i class="ti-power-off mR-10"></i>
                                <span>Logout</span>
                            </a>
                            <form action="{{ route('logout') }}" method="post" style="display: inline">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>

    <!-- ### $App Screen Content ### -->
    <main class='main-content bgc-grey-100' id="app">
        <div id='mainContent'>
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </main>

    <!-- ### $App Screen Footer ### -->
    <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
        <span>Copyright © 2017 Designed by <a href="https://colorlib.com" target='_blank' title="Colorlib">Colorlib</a>. All rights reserved.</span>
    </footer>
</div>
<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
