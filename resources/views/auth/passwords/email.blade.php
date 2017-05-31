@extends('layouts.auth')

@section('content')

	<div class="content">
	    
		@include('auth.partials.header', ['title' => 'Reset your password'])

        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-offset-3 col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-6">
                    <button type="submit" class="btn btn-block btn-primary">
                        Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
