@extends('layouts.auth')

@section('content')

	<div class="left">
		<div class="content">
			
			@include('auth.partials.header', ['title' => 'Login to your account'])

			<form class="form-auth-small" method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="signin-email" class="control-label sr-only">Email</label>
					<input name="email" type="email" class="form-control" id="signin-email" value="{{ old('email') ?: 'ravuthz@gmail.com' }}" placeholder="Email">
					@if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="signin-password" class="control-label sr-only">Password</label>
					<input name="password" type="password" class="form-control" id="signin-password" value="{{ old('password') ?: '123123' }}" placeholder="Password">
					@if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
				</div>
				<div class="form-group clearfix">
					<label class="fancy-checkbox element-left">
						<input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
						<span>Remember me</span>
					</label>
				</div>
				<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
				<div class="bottom">
					<span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
				</div>
			</form>
		</div>
	</div>
	
	<div class="right">
		<div class="overlay"></div>
		<div class="content text">
			<h1 class="heading">Free Bootstrap dashboard template</h1>
			<p>by The Develovers</p>
		</div>
	</div>
	
	<div class="clearfix"></div>

@endsection
