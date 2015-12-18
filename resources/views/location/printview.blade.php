@extends('master._printview', ['title' => 'Location Report'])
<a href="{{ url('/locations') }}" class="btn btn-xs btn-link">&laquo; Back</a>
@section('printdata')
	<div class="row">
		<table class="table table-condensed not-dt" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Devices Assigned</th>
				</tr>
			</thead>
			<tbody>
				@foreach($locations as $location)
					<tr>
						<td>{{ $location->id }}</td>
						<td>{{ $location->name }}</td>
						<td>{{ $location->devices()->count() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop