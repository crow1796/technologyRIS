@extends('master.layout', ['title' => 'Edit Information'])
@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	<h1 class="text-center page-header">
		Edit Information
	</h1>
	@include('errors._errors')
	{!! Form::model(Auth::user(), ['url' => url(Auth::user()->slug, 'edit')]) !!}
		{{-- <div class="form-group">
			{!! Form::label('username', 'Username:') !!}
			{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Desired username']) !!}
		</div> --}}
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
			{!! Form::submit('Update', ['class' => 'btn btn-sm btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@stop

@section('footer')
	@include('master._footer')
	@include('master._permission_info_modal')
@stop