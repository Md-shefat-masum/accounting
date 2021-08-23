@extends('backend.layouts.login_app')

@section('content')
    <div id="signinContainer" class="container signin">
        <div class="row">
            <div class="col-xl-6 col-lg-8 col-md-8 col-12 offset-md-2 offset-lg-2 offset-xl-3">
                <div class="logos text-center ">
                    <img src="{{ asset('backend/assets/images/logo.png') }}">
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h6 class="small">Sign In</h6>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="form">
                                        <div class="form-group">
                                            <label class="small">Email/Mobile</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="small">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="text-right" style="padding: 2px 5px 15px 0;">
                                            <a class="small light" tabindex="6">Forgot your password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary btn-block submit" id="signin" tabindex="3" data-style="zoom-out">
                                            <span class="spin-label">Sign In</span>
                                            <span class="spinner"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-footer text-center light">
                        <p class="small text-muted">or Sign in with Google</p>
                        <div class="row">
                            <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
                                <a tabindex="4" class="btn btn-default btn-block partner gapps-btn">
                                    <div class="gapps-content">
                                        <div class="icon">
                                            <img src="{{ asset('backend/assets/images/google.svg') }}">
                                        </div>
                                        <span class="button-text ellipsis">Sign in with Google</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <p class="small text-muted light">
                        Don’t have an account? <a href="{{ route('register') }}">Sign up Now</a>.
                    </p>
                </div>
                <div class="marketplace text-center">
                    <div class="hr"></div>
                    <p class="light small text-muted">Akaunter is also available on:</p>
                    <a class="link android" href="https://play.google.com/store/apps/details?id=com.oneup.app" target="_blank">Andoid</a>
                    <a class="link chrome" href="https://chrome.google.com/webstore/detail/one-up-accounting-invoici/ikeeocifpdhbdkblghhoflnppplpkoej" target="_blank">Chrome marketplace</a>
                </div>
                <div class="text-center text-muted light footer">
                    <a target="_blank">Support</a>•
                    <a target="_blank">Terms of use</a>•
                    <a target="_blank">Privacy policy</a>
                    <p>© 2020 Akaunter</p>
                </div>
            </div>
        </div>
    </div>

@endsection
