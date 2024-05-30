<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}-Male-Fashion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity)) !important;
        }
        .text-gray-200 {
    --tw-text-opacity: 1;
    color: rgb(229 231 235 / var(--tw-text-opacity)) !important;
}

    </style>
</head>

<body>
    @include('sweetalert::alert')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                @if (Route::has('login'))
                @auth
                <x-app-layout>

                </x-app-layout>
                <div class="offcanvas__top__hover">
                    <span>{{ Auth::user()->name }} <i class="arrow_carrot-down"></i></span>
                    <ul>
                        <li><a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-200  focus:outline-none  transition duration-150 ease-in-out"
                                href="{{ url('profile') }}">
                                {{ __('Profile') }}</a></li>
                        <li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a class="block w-full px-3 py-2 text-start text-sm leading-5 text-gray-200 focus:outline-none  transition duration-150 ease-in-out"
                                    href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}</a>
                            </form>
                        </li>

                    </ul>
                </div>
                @else
                <a href="{{ url('signin') }}">Sign In</a>

                @if (Route::has('register'))
                <a href="{{ url('signup') }}">Sign Up</a>
                @endif
                @endauth
                @endif
            </div>

        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ asset('home/img/icon/search.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('home/img/icon/heart.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('home/img/icon/cart.png') }}" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">

                                @if (Route::has('login'))
                                @auth
                                <x-app-layout>

                                </x-app-layout>
                                <div class="header__top__hover">
                                    <span>{{ Auth::user()->name }} <i class="arrow_carrot-down"></i></span>
                                    <ul>
                                        <li><a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700  focus:outline-none  transition duration-150 ease-in-out"
                                                href="{{ url('profile') }}">
                                                {{ __('Profile') }}</a></li>
                                        <li>
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <a class="block w-full px-3 py-2 text-start text-sm leading-5 text-gray-700 focus:outline-none  transition duration-150 ease-in-out"
                                                    href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}</a>
                                            </form>
                                        </li>

                                    </ul>
                                </div>

                                @else
                                <a href="{{ url('signin') }}">Sign In</a>

                                @if (Route::has('register'))
                                <a href="{{ url('signup') }}">Sign Up</a>
                                @endif
                                @endauth
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('home/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class=" @if ( $menu == "Home active")
                            {{ $menu }}
                            @endif"><a href="{{ url('/') }}">Home</a></li>
                            <li class=" @if ( $menu == "About active")
                            {{ $menu }}
                            @endif"><a href="{{ url('/about') }}">About Us</a></li>
                            <li class=" @if ( $menu == "Shop active")
                            {{ $menu }}
                            @endif"><a href="{{ url('/shop') }}">Shop</a></li>
                            <li><a href="#">Cart & Order</a>
                                <ul class="dropdown">
                                    <li class=" @if ( $menu == "Cart active")
                                    {{ $menu }}
                                    @endif"><a href="{{ url('/cart') }}">Shopping Cart</a></li>
                                    <li class=" @if ( $menu == "Order active")
                                    {{ $menu }}
                                    @endif"><a href="{{ url('/order') }}">My Orders</a></li>
                                </ul>
                            </li>
                            {{-- <li class=" @if ( $menu == "Blog active")
                            {{ $menu }}
                            @endif"><a href="{{ url('/blog') }}">Blog</a></li> --}}
                            <li class=" @if ( $menu == "Contact active")
                            {{ $menu }}
                            @endif"><a href="{{ url('/contact') }}">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{ asset('home/img/icon/search.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('home/img/icon/heart.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('home/img/icon/cart.png') }}" alt=""> <span>2</span></a>
                        <div class="price">$0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->
