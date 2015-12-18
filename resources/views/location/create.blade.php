@extends('master.layout', ['title' => 'Add New Location'])

@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	<p class="button-container"><a class="btn btn-xs btn-primary mybtn" href="{{ url('/locations') }}">&laquo; Back</a></p>
	<h1 class="text-center page-header">
		Add New Location
	</h1>
	@include('errors._errors')
	{!! Form::open(['url' => '/locations', 'class' => 'form', 'id' => 'addLocationForm']) !!}
		@include('location.partials._form', ['btnText' => 'CREATE'])
	{!! Form::close() !!}
@stop

@section('footer')
	@include('master._footer')
    @include('master._permission_info_modal')
@stop