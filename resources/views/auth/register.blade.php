@extends('layouts.layout')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
        <select name="role" class="form-control" >
            <option value="2">Freelancer</option>
            <option value="3">Client</option>
        </select> 
    </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div>
<div class="page-wrapper">
		<div class="page-section">
			<div class="container">
				<div class="authen-wrapper">
					<div class="authen-register">
														<h2 text-align:center;>Sign Up</h2>
												<form role="form" id="signup_form"method="POST" action="{{ route('register') }}">
                                                @csrf
							<div class="input-field">
								<input type="text" name="name" id="name" placeholder="Name">
							</div>
							<div class="input-field">
								<input type="text" name="email" id="email" placeholder="Email">
							</div>
							<div class="dropdown">
                            <label>Role</label>
        <select name="role" class="form-control" >
            <option value="2">Freelancer</option>
            <option value="3">Client</option>
        </select> 

    </div>
							<div class="input-field">
								<input type="password" name="password" id="password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="input-field">
								<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Your Password">
							</div>
																					<div class="input-field">
							</div>
							<div class="input-field">
								<button type="submit" class="btn btn-primary">Sign Up</button>
							</div>
						</form>

						<div class="authen-footer">
							<p>Already have an account? <a href="../login/index.html" class="secondary-color">Log In</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
					</div>
					
							</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
