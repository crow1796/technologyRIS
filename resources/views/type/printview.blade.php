@extends('master._printview', ['title' => 'Device Type Reports'])
<a href="{{ url('/types') }}" class="btn btn-xs btn-link">&laquo; Back</a>
@section('printdata')
	<div class="row">
		<table class="table table-condensed not-dt" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Total Devices</th>
				</tr>
			</thead>
			<tbody>
				@foreach($types as $type)
					<tr>
						<td>{{ $type->id }}</td>
						<td>{{ $type->name }}</td>
						<td>{{ $type->devices()->count() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop