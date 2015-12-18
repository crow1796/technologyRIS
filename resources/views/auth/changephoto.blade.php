@extends('master.layout', ['title' => 'Change Photo'])
@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	<h1 class="text-center page-header">
		Change Photo
	</h1>
	@include('errors._errors')

	{!! Form::open(['url' => url(Auth::user()->slug, 'changephoto'), 'files' => true]) !!}
		<div class="form-group">
			{!! Form::label('user_photo', 'Upload a photo:') !!}
			{!! Form::file('user_photo', ['accept' => 'image/*']) !!}
		</div>
		<div class="form-group text-center">
			{!! Form::reset('Reset', ['class' => 'btn btn-sm btn-warning']) !!}
			{!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@stop

@section('footer')
	@include('master._footer')
	@include('master._permission_info_modal')
@stop