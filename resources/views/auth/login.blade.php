@extends('master.layout', ['title' => 'Welcome to Techonology Inventory Resource System'])

<div class="container">
		<h1 class="text-center">
			Techonology Resource Inventory System
		</h1>
		<div class="col-sm-4 col-sm-offset-4 login-form">
			<h2 class="page-header text-center login-header">Login</h2>
			{!! Form::open(['url' => url('/login'), 'class' => 'form-horizontal']) !!}
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
						</div>
						{!! Form::input('text', 'username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
						</div>
					{!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::input('checkbox', 'remember-me') !!}
					{!! Form::label('remember-me', 'Remember Me') !!}
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-lg btn-default pull-right">SIGN IN</button>
				</div>
				@include('errors._errors')
			{!! Form::close() !!}
		</div>
	</div>
</div>
@section('footer')
	@include('master._footer')
@stop