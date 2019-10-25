@extends('layouts.layout')


@section('content')

<div class="page-wrapper">
        <div class="page-section">
            <div class="container">
                <div class="authen-wrapper">
                    <div class="authen-login">
                        <h2>Log into Your Account</h2>
                        <form role="form" id="signin_form" class=""method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-field">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Username or Email">
                                       @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Password">
                                       @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                                        <div class="input-field">
                                <button class="btn-submit submit-btn primary-bg-color">Log In</button>
                            </div>
                            <div class="input-field">
                                <label class="checkbox login-remember" for="remember">
                                    <input id="remember" name="remember" type="checkbox">
                                    <span></span>
									Remember me                                </label>
                            </div>
                        </form>
                        <div class="login-social">
							            {{-- <p>You can use your social account to log in</p>
		        <ul class="login-social-list">
			                <li id="facebook">
                    <a href="index.html#" class="fb facebook_auth_btn ">
                        <i class="fa fa-facebook-square"></i>
                        <span class="social-text">Facebook</span>
                    </a>
                </li>
												        </ul> --}}
		                        </div>
                        <div class="authen-footer">
							                                <div class="not-yet-register">
                                    <a href="/register"
                                       class="">Not yet register?</a>
                                </div>
							                            <div class="forgot-password">
                                <a href="../forgot-password/"
                                   class="">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection