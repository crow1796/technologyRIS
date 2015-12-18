@extends('master.layout', ['title' => 'Edit Device Type'])

@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	<p class="button-container"><a class="btn btn-xs btn-primary mybtn" href="{{ url('/types') }}">&laquo; Back</a></p>
	<h1 class="text-center page-header">
		Edit Device Type
	</h1>
	@include('errors._errors')
	{!! Form::model($deviceType, ['url' => url('/types', $deviceType->slug), 'class' => 'form', 'id' => 'editDeviceTypeForm', 'method' => 'PATCH']) !!}
		@include('type.partials._form', ['btnText' => 'UPDATE'])
	{!! Form::close() !!}
@stop

@section('footer')
	@include('master._footer')
    @include('master._permission_info_modal')
@stop