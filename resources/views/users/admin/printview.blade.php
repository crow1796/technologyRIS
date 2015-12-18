@extends('master._printview', ['title' => 'System Administrators'])
<a href="{{ url('/users/admins') }}" class="btn btn-xs btn-link">&laquo; Back</a>
@section('printdata')
	<div class="row">
		<table class="table table-condensed not-dt" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Permission</th>
					<th>Username</th>
					<th>Name</th>
					<th>Date Created</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<th>{{ $user->id }}</th>

						<td>{{ $user->permission->name }}</td>

						<td>{{ $user->username }}</td>

						<td>{{ $user->firstname . ' ' . $user->lastname }}</td>

						<td>{{ $user->created_at }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop