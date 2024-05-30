<x-homeheader title="Signin" description="Male_Fashion Signin" keywords="Male_Fashion, unica, creative, E-commerce,Signin" menu=""/>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-blog set-bg" data-setbg="{{ asset('home/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Sign In</h2>
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
                        <h2>Sign In</h2>

                    </div>

                </div>
                <div class="contact__form">
                    <x-validation-errors class="mb-4" style="
                        color: red !important;
                    " />

                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600" style="
                    color: red !important;
                ">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <input id="email" type="email" name="email" :value="old('email')" required autofocus
                                    autocomplete="username" placeholder="Email">
                            </div>
                            <div class="col-lg-12">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <input id="password" type="password" name="password" required
                                    autocomplete="current-password" placeholder="Password">
                            </div>
                            <div class="col-lg-12">
                                @if (Route::has('password.request'))
                                <a class="btn" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                                <button type="submit" class="site-btn">{{ __('Log in') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<x-homefooter />
