<x-homeheader title="Signup" description="Male_Fashion Signup" keywords="Male_Fashion, unica, creative, E-commerce,Signup" menu=""/>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-blog set-bg" data-setbg="{{ asset('home/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Sign Up</h2>
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
                        <h2>Sign Up</h2>

                    </div>

                </div>
                <div class="contact__form">
                    <x-validation-errors class="mb-4" style="
                        color: red !important;
                    " />
                    <form action="{{ url('register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <x-label for="name" value="{{ __('Name') }}" />
                                <input id="name" type="text" name="name" :value="old('name')" required autofocus
                                    autocomplete="name" placeholder="Enter your Name">
                            </div>
                            <div class="col-lg-12">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <input id="email" type="email" name="email" :value="old('email')" required
                                    autocomplete="username" placeholder="Enter your Email">
                            </div>
                            <div class="col-lg-12">
                                <x-label for="phone" value="{{ __('Phone') }}" />
                                <input id="phone" type="number" name="phone" :value="old('phone')" required autofocus
                                    autocomplete="phone" placeholder="Enter your Phone">
                            </div>
                            <div class="col-lg-12">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <input id="password" type="password" name="password" required
                                    autocomplete="new-password" placeholder="Enter your Password">
                            </div>
                            <div class="col-lg-12">
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                            <div class="col-lg-12">
                                <a class="btn" href="{{ url('signin') }}">
                                    {{ __('Already registered?') }}
                                </a>
                                <button type="submit" class="site-btn">{{ __('Sign up') }}</button>
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
