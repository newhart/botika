<section class="log-in-section section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="{{asset('assets/images/inner-page/sign-up.png')}}" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="log-in-box">
                    <div class="log-in-title">
                        <h3>Welcome To Fastkart</h3>
                        <h4>Create New Account</h4>
                    </div>

                    <div class="input-box">
                        <form class="row g-4" method="POST" action="{{route('register')}}">
                            @csrf
                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    @include('share.input' , ['type' => 'text' , 'placeholder' => 'Full Name' , 'name' => 'name'])
                                    <label for="fullname">Full Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    @include('share.input' , ['type' => 'text' , 'placeholder' => 'Email Address' , 'name' => 'email'])
                                    <label for="email">Email Address</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    @include('share.input' , ['type' => 'password' , 'placeholder' => 'Password' , 'name' => 'password'])
                                    <label for="password">Password</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    @include('share.input' , ['type' => 'password' , 'placeholder' => 'Confirm Password' , 'name' => 'password_confirmation'])
                                    <label for="password">Confirm Password</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="forgot-box">
                                    <div class="form-check ps-0 m-0 remember-box">
                                        <input class="checkbox_animated check-box" type="checkbox"
                                            id="flexCheckDefault" name="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">I agree with
                                            <span>Terms</span> and <span>Privacy</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="bg-red-400 w-100 text-white px-3 py-3 rounded-md" type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>

                    <div class="other-log-in">
                        <h6>or</h6>
                    </div>

                    <div class="log-in-button">
                        <ul>
                            <li>
                                <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&flowEntry=ServiceLogin"
                                    class="btn google-button w-100">
                                    <img src="../assets/images/inner-page/google.png" class="blur-up lazyload"
                                        alt="">
                                    Sign up with Google
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/" class="btn google-button w-100">
                                    <img src="../assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                        alt=""> Sign up with Facebook
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="other-log-in">
                        <h6></h6>
                    </div>

                    <div class="sign-up-box">
                        <h4>Already have an account?</h4>
                        <a href="{{route('login')}}">Log In</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
        </div>
    </div>
</section>
