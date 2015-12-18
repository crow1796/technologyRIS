@extends('master.layout', ['title' => 'System Administrators'])

@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	@include('errors.message')
	@include('errors._errors')
	<h1 class="text-center page-header">
		System Administrators
	</h1>

	<div class="row">
		<div class="col-sm-12">
			<div class="btn-group">
				<a href="{{ url('/users/admins/create') }}" class="btn btn-sm btn-primary">
					<span class="glyphicon glyphicon-plus"></span>
					Add Administrator
				</a>
				<a class="btn btn-sm btn-success" href="{{ url('/users/admins/print') }}"><span class="glyphicon glyphicon-print"></span>  Print</a>
			</div>
		</div>{{-- End Col --}}
	</div>{{-- End Row --}}

	<div class="row table-container">
		<div class="col-sm-12">
			<table class="table table-striped dt-responsive" width="100%">
				<thead>
					<tr>
						<th class="min-tablet-p">ID</th>
						<th class="min-tablet-p">Permission</th>
						<th class="all">Username</th>
						<th class="min-tablet-p">Name</th>
						<th class="min-tablet-l">Actions</th>
						<th class="min-tablet-l">Date Created</th>
					</tr>
				</thead>

				<tbody>
					@foreach($users as $user)
						<tr>
							<th>{{ $user->id }}</th>

							<td>{{ $user->permission->name }}</td>

							<td>{{ $user->username }}</td>

							<td>{{ $user->firstname . ' ' . $user->lastname }}</td>

							<td>
								<a class="btn btn-xs btn-link" title="Click to Edit" href="{{ url('/users/admins', $user->slug) }}/edit">
									<span class="glyphicon glyphicon-edit"></span>
								</a>

			                    <a title="Click to Delete" data-toggle="modal" class="btn btn-xs btn-link deleteadminbtn" href="#deletemodal">
			                    	<span class="glyphicon glyphicon-trash"></span>
			                    </a>

			                    <a class="btn btn-xs btn-link editadminpermissionbtn" href="#editadminpermissionmodal" data-toggle="modal" title="Click to assign this user as 'System User'">
			                    	<span class="glyphicon glyphicon-user"></span>
			                    </a>
	                        </td>

							<td>{{ $user->created_at->toFormattedDateString() }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	{{-- Modal --}}
	<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="deleteModalLabel">
						Confirm
					</h4>
				</div>
				<div class="modal-body">
					<p class="text-center">
						Are you sure you want to delete this user?
					</p>
				</div>
				<div class="modal-footer">
					{!! Form::open(['method' => 'DELETE', 'id' => 'deleteadminform']) !!}
					    {!! Form::input('button', 'close', 'Close', ['data-dismiss' => 'modal', 'class' => 'btn btn-default']) !!}

					    {!! Form::submit('Confirm', ['class' => 'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- Change permission modal --}}
	<div class="modal fade" id="editadminpermissionmodal" tabindex="-1" role="dialog" aria-labelledby="editadminpermissionlabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="editadminpermissionlabel">
						Confirm
					</h4>
				</div>
				<div class="modal-body">
					<p class="text-center">
						Are you sure you want to make this user as "System User"?
					</p>
				</div>
				<div class="modal-footer">
					{!! Form::open(['id' => 'editadminpermissionform']) !!}
					    {!! Form::input('button', 'close', 'Close', ['data-dismiss' => 'modal', 'class' => 'btn btn-default']) !!}

					    {!! Form::submit('Confirm', ['class' => 'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop

@section('footer')
	@include('master._footer')
    @include('master._permission_info_modal')
@stop