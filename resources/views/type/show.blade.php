@extends('master.layout', ['title' => 'Manage Device Type'])
@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	<p class="button-container"><a class="btn btn-xs btn-primary mybtn" href="{{ url('/types') }}">&laquo; Back</a></p>
	<h1 class="page-header text-center">
		{{ $deviceType->name }}
	</h1>
@stop

@section('footer')
	@include('master._footer')
    @include('master._permission_info_modal')
@stop