@extends('master.layout', ['title' => 'System Logs'])
@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	<h1 class="text-center page-header">
		System Logs
	</h1>

	<div class="row info-row">
		<div class="col-sm-4 col-sm-offset-2">
			<img src="{{ asset('images/activitylog_icon.png') }}" alt="Activity Log" class="img-responsive center-block">
			<h2 class="text-center">
				Activity Logs
			</h2>
			<div>
				<a href="{{ url('/logs/activitylogs') }}" class="btn btn-lg btn-block">
					View
				</a>
			</div>
		</div>

		<div class="col-sm-4">
			<img src="{{ asset('images/userlog_icon.png') }}" alt="User Log" class="img-responsive center-block">
			<h2 class="text-center">
				User Logs
			</h2>
			<div>
				<a href="{{ url('/logs/userlogs') }}" class="btn btn-lg btn-block">
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