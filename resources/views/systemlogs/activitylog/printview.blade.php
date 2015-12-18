@extends('master._printview', ['title' => 'Activity Log'])
<a href="{{ url('/logs/activitylogs') }}" class="btn btn-xs btn-link">&laquo; Back</a>
@section('printdata')
	<div class="row">
		<table class="table table-condensed not-dt" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>User</th>
					<th>Activity</th>
					<th>Activity Done</th>
				</tr>
			</thead>
			<tbody>
				@foreach($activities as $activity)
						<tr>
							<td>{{ $activity->id }}</td>
							<td>{{ $activity->user->username }}</td>
							<td>{{ $activity->action }}</td>
							<td>{{ $activity->created_at }}</td>
						</tr>
					@endforeach
			</tbody>
		</table>
	</div>
@stop