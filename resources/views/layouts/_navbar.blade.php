<nav>
	<div class="nav-wrapper indigo darken-2">
		<a class="brand-logo" href="{{ URL::route('home') }}">{{ $app_name }}</a>
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

		<ul class="right hide-on-med-and-down">
			@if (Auth::guest())
				<li>
					<a href="{{ URL::route('login') }}">
						{{ Lang::get('navbar.login_btn') }}
					</a>
				</li>
				<li>
					<a href="{{ URL::route('signup') }}">
						{{ Lang::get('navbar.signup_btn') }}
					</a>
				</li>
			@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="fa fa-user"></i>{{ Auth::user()->name }}<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="{{ URL::route('logout') }}">
								{{ Lang::get('navbar.logout_btn') }}
							</a>
						</li>
					</ul>
				</li>
			@endif
		</ul>

		<ul class="side-nav" id="mobile-demo">
			@if (Auth::guest())
				<li>
					<a href="{{ URL::route('login') }}">
						{{ Lang::get('navbar.login_btn') }}
					</a>
				</li>
				<li>
					<a href="{{ URL::route('signup') }}">
						{{ Lang::get('navbar.signup_btn') }}
					</a>
				</li>
			@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="{{ URL::route('logout') }}">
								{{ Lang::get('navbar.logout_btn') }}
							</a>
						</li>
					</ul>
				</li>
			@endif
		</ul>
	</div>
</nav>