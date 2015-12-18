@if(!$updateOnly)
<div class="form-group">
	{!! Form::label('username', 'Username:') !!}
	{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Desired username']) !!}
</div>

<div class="form-group">
	{!! Form::label('password', 'Password:') !!}
	{!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Desired Password']) !!}
</div>

<div class="form-group">
	{!! Form::label('password_confirmation', 'Re-enter Password:') !!}
	{!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Re-enter desired Password']) !!}
</div>

@endif

<div class="form-group">
	{!! Form::label('email', 'E-mail address:') !!}
	{!! Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'Desired E-mail']) !!}
</div>

<div class="form-group">
	<div class="row">
		<div class="col-sm-4">
			{!! Form::label('firstname', 'First Name:') !!}
			{!! Form::input('text', 'firstname', null, ['class' => 'form-control', 'placeholder' => 'Your First Name']) !!}
		</div>

		<div class="col-sm-4">
			{!! Form::label('middlename', 'Middle Name:') !!}
			{!! Form::input('text', 'middlename', null, ['class' => 'form-control', 'placeholder' => 'Your Middle Name']) !!}
		</div>

		<div class="col-sm-4">
			{!! Form::label('lastname', 'Last Name:') !!}
			{!! Form::input('text', 'lastname', null, ['class' => 'form-control', 'placeholder' => 'Your Last Name']) !!}
		</div>
	</div>
</div>

<div class="form-group text-center">
	{!! Form::reset('Reset', ['class' => 'btn btn-sm btn-warning']) !!}
	{!! Form::submit($btnText, ['class' => 'btn btn-sm btn-primary']) !!}
</div>