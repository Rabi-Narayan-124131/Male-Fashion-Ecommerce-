<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Payment">
    <meta name="keywords" content="Male_Fashion, unica, creative, Payment">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment-Male-Fashion</title>

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

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ url('/shop') }}">Shop</a></li>
                            <li><a href="{{ url('/cart') }}">Shopping Cart</a></li>
                            <li><a href="{{ url('/blog') }}">Blog</a></li>
                            <li><a href="{{ url('/contacts') }}">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{ asset('home/img/icon/search.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('home/img/icon/heart.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('home/img/icon/cart.png') }}" alt=""> <span>0</span></a>
                        <div class="price">$0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->
    <section class="breadcrumb-blog set-bg" data-setbg="{{ asset('home/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Pay Using Your <span>Card</span></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Payment Details</h2>

                        </div>

                    </div>
                    <div class="panel panel-default credit-card-box">
                        <div class="contact__form panel-body">
                            @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                            @endif
                            @if (Session::has('message'))
                            <div class="alert alert-danger text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('message') }}</p>
                            </div>
                            @endif

                            <form role="form" action="{{ route('stripe.post') }}" method="post"
                                class="require-validation" data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                @csrf

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Name on Card</label> <input class='form-control'
                                            size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label> <input autocomplete='off'
                                            class='form-control card-number' size='20' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="hidden" name="name" value="{{ $name }}">
                                        <input type="hidden" name="phone" value="{{ $phone }}">
                                        <input type="hidden" name="address" value="{{ $address }}">
                                        <input type="hidden" name="bill" value="{{ $bill }}">
                                        <button class="site-btn btn-block" type="submit">Pay Now
                                            (${{ $bill }})</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('home/img/footer-logo.png') }}" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="{{ asset('home/img/payment.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());

                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('home/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('home/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home/js/main.js') }}"></script>
</body>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function () {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function (e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });

</script>

</html>
