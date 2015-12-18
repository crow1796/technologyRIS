<div class="accordion">
	<div class="user-thumbnail text-center">
		<img class="img-thumbnail img-responsive img" src="{{ asset('images/uploads/'.Auth::user()->photo->path) }}">
	</div>{{-- End User thumbnail --}}
	<div class="user-info">
	
		<ul class="nav nav-pills nav-stacked">
			<li class="user-permission text-center" data-toggle="modal" data-target="#permission_info_modal">{{ Auth::user()->permission->name }} 
					<span class="glyphicon glyphicon-info-sign"></span>
			</li>
			<li class="user-name dropdown text-center">
				<a href="" role="button" data-toggle="dropdown">
					{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }} <span class="caret"></span>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ url(Auth::user()->slug) }}/changephoto">
								<span class="glyphicon glyphicon-picture"></span> Change Photo
							</a>
						</li>
						<li>
							<a href="{{ url(Auth::user()->slug) }}/edit">
								<span class="glyphicon glyphicon-user"></span> Edit Profile
							</a>
						</li>
						<li>
							<a href="{{ url(Auth::user()->slug) }}/changepassword">
								<span class="glyphicon glyphicon-cog"></span> Change Password
							</a>
						</li>
						<li>
							<a href="{{ url('/logout') }}">
								<span class="glyphicon glyphicon-off"></span> Logout
							</a>
						</li>
					</ul>
				</a>
			</li>
		</ul>
	</div>
	<ul class="nav nav-pills nav-stacked">
		<li>
			<a href="{{ url('/') }}">
				<span class="glyphicon glyphicon-home"></span> Home
			</a>
		</li>
		<li class="dropdown">
			<a href="" role="button" data-toggle="dropdown">
				<span class="glyphicon glyphicon-phone"></span> Manage Devices <span class="caret"></span>
				<ul class="dropdown-menu">
					<li>
						<a href="{{ url('/devices') }}">
							<span class="glyphicon glyphicon-briefcase"></span> Stocks
						</a>
					</li>
					<li>
						<a href="{{ url('/types') }}">
							<span class="glyphicon glyphicon-phone"></span> Device Types
						</a>
					</li>
				</ul>
			</a>
		</li>
		<li>
			<a href="{{ url('/locations') }}">
				<span class="glyphicon glyphicon-map-marker"></span> Manage Locations
			</a>
		</li>
		<li class="dropdown">
			<a href="" role="button" data-toggle="dropdown">
				<span class="glyphicon glyphicon-user"></span> Manage Users <span class="caret"></span>
				<ul class="dropdown-menu">
					<li>
						<a href="{{ url('/users/admins') }}">
							<span class="glyphicon glyphicon-user"></span> System Admin
						</a>
					</li>
					<li>
						<a href="{{ url('/users/systemusers') }}">
							<span class="glyphicon glyphicon-user"></span> System User
						</a>
					</li>
				</ul>
			</a>
		</li>
		<li class="dropdown">
			<a href="" role="button" data-toggle="dropdown">
				<span class="glyphicon glyphicon-book"></span> System Log <span class="caret"></span>
				<ul class="dropdown-menu">
					<li>
						<a href="{{ url('/logs/activitylogs') }}">
							<span class="glyphicon glyphicon-file"></span> Activity Log
						</a>
					</li>
					<li>
						<a href="{{ url('/logs/userlogs') }}">
							<span class="glyphicon glyphicon-file"></span> User Log
						</a>
					</li>
				</ul>
			</a>
		</li>
	</ul>{{-- End Nav --}}
</div>
