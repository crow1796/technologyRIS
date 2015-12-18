@extends('master.layout', ['title' => 'Add New User'])
@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	<p class="button-container"><a class="btn btn-xs btn-primary mybtn" href="{{ url('/users/admins') }}">&laquo; Back</a></p>
	<h1 class="text-center page-header">
		Edit User
	</h1>
	@include('errors.message')
	@include('errors._errors')
	{!! Form::model($user, ['url' => url('/users/admins', $user->slug), 'class' => 'form', 'id' => 'editAdminForm', 'method' => 'PATCH']) !!}
		@include('users.admin.partials._form', ['btnText' => 'UPDATE', 'updateOnly' => true])
	{!! Form::close() !!}
@stop

@section('footer')
	@include('master._footer')
    @include('master._permission_info_modal')
@stop