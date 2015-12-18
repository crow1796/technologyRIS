@extends('master.layout', ['title' => 'Manage Locations'])

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
		Manage Locations
	</h1>{{-- End Header --}}
	
	<div class="row">
		<div class="col-sm-12">
			<div class="btn-group">
				<a href="{{ url('/locations/create') }}" class="btn btn-sm btn-primary">
					<span class="glyphicon glyphicon-plus"></span>
					Add Location
				</a>
				<a class="btn btn-sm btn-success" href="{{ url('/locations/print') }}"><span class="glyphicon glyphicon-print"></span>  Print</a>
			</div>
		</div>{{-- End Col --}}
	</div>{{-- End Row --}}

	<div class="row table-container">
		<div class="col-sm-12">
			<table class="table table-striped dt-responsive" width="100%">
				<thead>
					<tr>
						<th class="min-tablet-p">ID</th>
						<th class="all">Name</th>
						<th class="min-tablet-p">Actions</th>
						<th class="min-tablet-p">Devices Assigned</th>
					</tr>
				</thead>

				<tbody>
					@foreach($locations as $location)
						<tr>
							<th>
								{{ $location->id }}
							</th>

							<td>
								{{ $location->name }}
							</td>

							<td>
								<a class="btn btn-xs btn-link glyphicon glyphicon-edit" title="Click to Edit" href="{{ url('/locations', $location->slug) }}/edit"></a>

								<a title="Click to Delete" data-toggle="modal" class="btn btn-xs btn-link glyphicon glyphicon-trash deletelocationbtn" href="#deletemodal"></a>
							</td>

							<td>
								{{ $location->devices()->count() }}
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
					<p class="text-cente">Are you sure you want to delete this location?</p>
				</div>
				<div class="modal-footer">
					{!! Form::open(['method' => 'DELETE', 'id' => 'deletelocationform']) !!}
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