<nav class="indigo darken-2">
	<div class="container">
		<div class="nav-wrapper">
			@if (Auth::guest())
				<a class="brand-logo" href="{{ URL::route('welcome') }}">{{ $app_name }}</a>
			@else
				<a class="brand-logo" href="{{ URL::route('home') }}">{{ $app_name }}</a>
			@endif
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
					<li>
						<a href="#" class='dropdown-button btn' data-activates="dropdownLogout">
							<!--i class="fa fa-user"></i-->
							{{ Auth::user()->name }}
							<i class="fa fa-caret-down"></i>
						</a>
						<ul id="dropdownLogout" class="dropdown-content">
							<li>
								<a href="#">Ver perfil</a>
							</li>
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
	</div>
</nav>