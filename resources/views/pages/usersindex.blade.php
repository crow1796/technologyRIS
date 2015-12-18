@extends('master.layout', ['title' => 'System Administrators'])

@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	@include('errors.message')
	<h1 class="text-center page-header">
		Users
	</h1>

	<div class="row info-row">
		<div class="col-sm-4 col-sm-offset-2">
			<img src="{{ asset('images/admin_icon.png') }}" alt="" class="img-responsive center-block">
			<h2 class="text-center">
				System Admins
			</h2>
			<div>
				<a href="{{ url('/users/admins') }}" class="btn btn-lg btn-block btn-primary">
					View
				</a>
			</div>
		</div>

		<div class="col-sm-4">
			<img src="{{ asset('images/systemuser_icon.png') }}" alt="" class="img-responsive center-block">
			<h2 class="text-center">
				System Users
			</h2>
			<div>
				<a href="{{ url('/users/systemusers') }}" class="btn btn-lg btn-block btn-primary">
					View
				</a>
			</div>
		</div>
	</div>
@stop

@section('footer')
	@include('master._footer')
    @include('master._permission_info_modal')
@stop