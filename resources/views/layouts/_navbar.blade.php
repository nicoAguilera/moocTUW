<nav class="navbar navbar-dark indigo darken-2">
	<!--div class="container-fluid">
		<div class="navbar-header"-->
			<button type="button" class="navbar-toggler hidden-sm-up" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<i class="fa fa-bars"></i>
			</button>
			<!--a class="navbar-brand btn-navbar" href="{{ URL::route('home') }}">{{ $app_name }}</a-->
		<!--/div-->
	<div class="container">
		<div class="collapse navbar-toggleable-xs" id="bs-example-navbar-collapse-1">
			<a class="navbar-brand" href="{{ URL::route('home') }}">{{ $app_name }}</a>
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::guest())
					<li class="nav-item">
						<a class="nav-link" href="{{ URL::route('login') }}">
							{{ Lang::get('navbar.login_btn') }}
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ URL::route('signup') }}">
							{{ Lang::get('navbar.signup_btn') }}
						</a>
					</li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>

	<!--/div-->
</nav>