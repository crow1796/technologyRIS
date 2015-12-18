@extends('master.layout', ['title' => 'User Logs'])
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
		User Logs
	</h1>

	<div class="row">
		<div class="col-sm-12">
			<div class="btn-group">
			    <a class="btn btn-sm btn-success" href="{{ url('/logs/userlogs/print') }}"><span class="glyphicon glyphicon-print"></span>  Print</a>
			</div>{{-- End Button group --}}
		</div>
	</div>

	<div class="row table-container">
		<div class="col-sm-12">
			<table class="table table-striped dt-responsive" width="100%">
				<thead>
					<tr>
						<th class="min-tablet-p">ID</th>
						<th class="all">User</th>
						<th class="min-tablet-p">Last Logged In</th>
						<th class="min-tablet-p">Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($userlogs as $userlog)
						<tr>
							<td>{{ $userlog->id }}</td>
							<td>{{ $userlog->user->username }}</td>
							<td>{{ $userlog->last_logged_in }}</td>
							<td>
								<a title="Click to Delete" data-toggle="modal" class="btn btn-xs btn-link deleteuserlogbtn" href="#deletemodal"><span class="glyphicon glyphicon-trash"></span> Delete</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>{{-- End Table --}}
		</div>
	</div>{{-- End Table responsive --}}

	{{-- Modal --}}
	<div class="modal fade" id="deletemodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Confirm</h4>
				</div>
				<div class="modal-body">
					<p class="text-cente">Are you sure you want to delete this activity?</p>
				</div>
				<div class="modal-footer">
					{!! Form::open(['method' => 'DELETE', 'id' => 'deleteuserlogform']) !!}
						{!! Form::input('button', 'close', 'Close', ['data-dismiss' => 'modal', 'class' => 'btn btn-default']) !!}
						
						{!! Form::submit('Confirm', ['class' => 'btn btn-primary confirm_btn']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>{{-- /Delete modal --}}
@stop

@section('footer')
	@include('master._footer')
    @include('master._permission_info_modal')
@stop