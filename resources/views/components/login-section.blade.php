<section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="{{ asset('assets/images/inner-page/log-in.png') }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="log-in-box">
                    <div class="log-in-title">
                        <h3>Welcome To Fastkart</h3>
                        <h4>Log In Your Account</h4>
                    </div>

                    <div class="input-box">
                        {{ session('status') }}
                        <form class="row g-4" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="col-12">
                                <div class="form-floating theme-form-floating log-in-form">
                                    @include('share.input', [
                                        'name' => 'email',
                                        'type' => 'text',
                                        'placeholder' => 'Email Address',
                                    ])
                                    <label for="email">Email Address</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating theme-form-floating log-in-form">
                                    @include('share.input', [
                                        'name' => 'password',
                                        'type' => 'password',
                                        'placeholder' => 'Password',
                                    ])
                                    <label for="password">Password</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="forgot-box">
                                    <div class="form-check ps-0 m-0 remember-box">
                                        <input class="checkbox_animated check-box" type="checkbox" id="flexCheckDefault"
                                            name="remember">
                                        <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                    </div>
                                    {{-- <a href="{{route('forgot.password')}}" class="forgot-password">Forgot Password?</a> --}}
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn-animation w-100 bg-red-400 w-100 text-white px-3 py-3"
                                    type="submit">Log
                                    In</button>
                            </div>
                        </form>
                    </div>

                    <div class="other-log-in">
                        <h6>or</h6>
                    </div>

                    <div class="log-in-button">
                        <ul>
                            <li>
                                <a href="{{ route('socialite.redirect', 'google') }}" class="btn google-button w-100">
                                    <img src="../assets/images/inner-page/google.png" class="blur-up lazyload"
                                        alt=""> Log In with Google
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/" class="btn google-button w-100">
                                    <img src="../assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                        alt=""> Log In with Facebook
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="other-log-in">
                        <h6></h6>
                    </div>

                    <div class="sign-up-box">
                        <h4>Don't have an account?</h4>
                        <a href="{{ route('register') }}">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
