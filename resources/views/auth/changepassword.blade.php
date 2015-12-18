@extends('master.layout', ['title' => 'Change Password'])
@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	<h1 class="text-center page-header">
		Change Password
	</h1>
	@include('errors._errors')
	{!! Form::open(['url' => url(Auth::user()->slug, 'changepassword')]) !!}
		<div class="form-group">
			{!! Form::label('old_password', 'Old Password') !!}
			{!! Form::input('password', 'old_password', null, ['class' => 'form-control', 'placeholder' => 'Enter old password']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('new_password', 'New Password') !!}
			{!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Enter new password']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'Re-enter new password') !!}
			{!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Re-enter new password']) !!}
		</div>
		<div class="form-group text-center">
			{!! Form::submit('Change password', ['class' => 'btn btn-sm btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@stop

@section('footer')
	@include('master._footer')
	@include('master._permission_info_modal')
@stop