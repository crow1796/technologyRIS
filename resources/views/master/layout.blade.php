<!DOCTYPE html>
<html>

    <head>
    <title>{{ $title }}</title>
        @include('master._assets')
    </head>

    <body>
		@yield('pageheader')
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					@yield('accordion')
				</div>
				<div class="col-md-9">
					@yield('content')
				</div>
			</div>
		</div>
		<div id="back_to_top" title="Back to top" data-toggle="tooltip" data-placement="left">
			<span class="glyphicon glyphicon-eject"></span>
		</div>
        @yield('footer')
    </body>

</html>