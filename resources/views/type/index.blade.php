@extends('master.layout', ['title' => 'Manage Device Types'])

@section('pageheader')
	@include('master._pageheader')
@stop

@section('accordion')
	@include('master._accordion')
@stop

@section('content')
	@include('errors.message')
	@include('errors._errors')
	<h1 class="page-header text-center">
		Manage Device Types
	</h1>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="btn-group">
			    <a class="btn btn-sm btn-primary" href="{{ url('/types/create') }}"><span class="glyphicon glyphicon-plus"></span>  Add Device Type</a>
			    <a class="btn btn-sm btn-success" href="{{ url('/types/print') }}"><span class="glyphicon glyphicon-print"></span>  Print</a>
			</div>{{-- End Button group --}}
		</div>
	</div>
	<div class="row table-container">
		<div class="col-sm-12">
	        <table class="table table-striped dt-responsive" width="100%">
	        	<thead>
	        		<tr>
	        			<th class="min-tablet-l">ID</th>
	        			<th class="all">Name</th>
	        			<th class="min-tablet-p">Actions</th>
	        			<th class="min-tablet-l">Total Devices</th>
	        		</tr>
	        	</thead>

	        	<tbody>
	        		@foreach($deviceTypes as $deviceType)
	        			<tr>
	        				<th>
	        					{{ $deviceType->id }}
	        				</th>

	        				<td>
	        					{{ $deviceType->name }}
	        				</td>

							<td>
								<a class="btn btn-xs btn-link glyphicon glyphicon-edit" title="Click to Edit" href="{{ url('/types', $deviceType->slug) }}/edit"></a>

								<a title="Click to Delete" data-toggle="modal" class="btn btn-xs btn-link glyphicon glyphicon-trash deletetypebtn" href="#deletemodal"></a>

							</td>

	        				<td>
	        					{{ $deviceType->devices()->count() }}
	        				</td>
	        			</tr>
	        		@endforeach
	        	</tbody>
			</table>
		</div>
	</div>
	{{-- Modal --}}
	<div class="modal fade" id="deletemodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Confirm</h4>
				</div>
				<div class="modal-body">
					<p class="text-cente">Are you sure you want to delete this device type?</p>
				</div>
				<div class="modal-footer">
					{!! Form::open(['method' => 'DELETE', 'id' => 'deletetypeform']) !!}
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

