<div class="header">
	<div class="logo text-center">
	    <img src="{{ asset('assets/img/logo-dark.png') }}" alt="Klorofil Logo">
	</div>
	<p class="lead">{{ $title }}</p>
</div>
	
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif