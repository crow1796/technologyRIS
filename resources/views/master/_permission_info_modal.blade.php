
<div class="modal fade" id="permission_info_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Permission Info</h4>
			</div>
			<div class="modal-body">
			{{-- Admin --}}
				<h4 class="text-center">Accessible pages for you</h4>
				@if(Auth::user()->isAdmin())
					<div>
						
						<ul>
							<li>Manage Devices
								<ul>
									<li>Add Device</li>
									<li>Update Device Information</li>
									<li>Delete Device</li>
									<li>Update Device Status</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage Device Types
								<ul>
									<li>Add Device Types</li>
									<li>Update Device Types Name</li>
									<li>Delete Device Types</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage Locations
								<ul>
									<li>Add Location</li>
									<li>Update Location Name</li>
									<li>Delete Location</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage Administrators
								<ul>
									<li>Add Admins</li>
									<li>Update Admin Info</li>
									<li>Update Admin Permission</li>
									<li>Delete Admin</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage System Users
								<ul>
									<li>Add System Users</li>
									<li>Update System Users Info</li>
									<li>Update System Users Permission</li>
									<li>Delete System Users</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage Activity Logs
								<ul>
									<li>Delete Activity</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage User Logs
								<ul>
									<li>Delete Activity</li>
									<li>Print</li>
								</ul>
							</li>
						</ul>
					</div>

				@else

					<div>
						<ul>
							<li>Manage Devices
								<ul>
									<li>Add Device</li>
									<li>Update Device Information</li>
									<li>Delete Device</li>
									<li>Update Device Status</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage Device Types
								<ul>
									<li class="forbid">Add Device Types</li>
									<li class="forbid">Update Device Types Name</li>
									<li class="forbid">Delete Device Types</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage Locations
								<ul>
									<li class="forbid">Add Location</li>
									<li class="forbid">Update Location Name</li>
									<li class="forbid">Delete Location</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage Administrators
								<ul>
									<li class="forbid">Add Admins</li>
									<li class="forbid">Update Admin Info</li>
									<li class="forbid">Update Admin Permission</li>
									<li class="forbid">Delete Admin</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage System Users
								<ul>
									<li class="forbid">Add System Users</li>
									<li class="forbid">Update System Users Info</li>
									<li class="forbid">Update System Users Permission</li>
									<li class="forbid">Delete System Users</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage Activity Logs
								<ul>
									<li class="forbid">Delete Activity</li>
									<li>Print</li>
								</ul>
							</li>
							<li>Manage User Logs
								<ul>
									<li class="forbid">Delete User log</li>
									<li>Print</li>
								</ul>
							</li>
						</ul>
					</div>

				@endif
			</div>
			{{-- Admin --}}
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-hidden="true">Ok, Thanks!</button>
			</div>
		</div>
	</div>
</div>
