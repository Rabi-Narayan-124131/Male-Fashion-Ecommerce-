<x-homeheader title="Forgot-Password" description="Male_Fashion Forgot_Password" keywords="Male_Fashion, unica, creative, E-commerce" menu=""/>

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
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                    <x-validation-errors class="mb-4" style="
                        color: red !important;
                    " />

                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ url('password.email') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <input id="email" type="email" name="email" :value="old('email')" required autofocus
                                    autocomplete="username" placeholder="Email">
                            </div>

                            <div class="col-lg-12">

                                <button type="submit" class="site-btn">{{ __('Email Password Reset Link') }}</button>
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
