@extends('master._printview', ['title' => 'User Log'])
<a href="{{ url('/logs/userlogs') }}" class="btn btn-xs btn-link">&laquo; Back</a>
@section('printdata')
	<div class="row">
		<table class="table table-condensed not-dt" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>User</th>
					<th>Last Logged In</th>
				</tr>
			</thead>
			<tbody>
				@foreach($userlogs as $userlog)
					<tr>
						<td>{{ $userlog->id }}</td>
						<td>{{ $userlog->user->username }}</td>
						<td>{{ $userlog->last_logged_in }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop