@extends('master._printview', ['title' => 'Device Report'])
<a href="{{ url('/devices') }}" class="btn btn-xs btn-link">&laquo; Back</a>
@section('printdata')
	<div class="row">
		<table class="table table-condensed not-dt" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Type</th>
					<th>Model</th>
					<th>Brand</th>
					<th class="none">Serial</th>
					<th>>Status</th>
					<th>Location</th>
				</tr>
			</thead>
			<tbody>
				@foreach($devices as $device)
					<tr>
						<td>{{ $device->id }}</td>
						<td>{{ $device->name }}</td>
						<td>{{ $device->deviceType->name }}</td>
						<td>{{ $device->model }}</td>
						<td>{{ $device->brand }}</td>
						<td>{{ $device->serial }}</td>
						@if($device->deviceStatus->id == 1)
						    <td class="bg-success">{{ $device->deviceStatus->name }}</td>
						@elseif($device->deviceStatus->id == 2)
						    <td class="bg-primary">{{ $device->deviceStatus->name }}</td>
						@elseif($device->deviceStatus->id == 3)
						    <td class="bg-warning">{{ $device->deviceStatus->name }}</td>
						@elseif($device->deviceStatus->id == 4)
						    <td class="bg-info">{{ $device->deviceStatus->name }}</td>
						@elseif($device->deviceStatus->id == 5)
						    <td class="bg-danger">{{ $device->deviceStatus->name }}</td>
						@endif
						<td>{{ $device->deviceLocation->name }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop