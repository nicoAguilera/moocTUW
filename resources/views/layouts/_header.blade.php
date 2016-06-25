<header>
	<nav class="indigo darken-2">
		<div class="container">
			<div class="nav-wrapper">
				@if (Auth::guest())
					<a class="brand-logo hide-on-large-only" href="{{ URL::route('welcome') }}">{{ $app_name }}</a>
				@else
					<a class="brand-logo hide-on-large-only" href="{{ URL::route('home') }}">{{ $app_name }}</a>
				@endif
				<a href="" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light hide-on-large-only">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</a>

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
								{{ Auth::user()->name }}
								<i class="fa fa-caret-down" aria-hidden="true"></i>
							</a>
							<ul id="dropdownLogout" class="dropdown-content">
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
	<ul id="nav-mobile" class="side-nav fixed">
		<div class="hide-on-med-and-down">
			@if (Auth::guest())
				<li class="logo bold">
					<a class="brand-logo title" href="{{ URL::route('welcome') }}">{{ $app_name }}</a>
				</li>
			@else
				<li class="logo bold">
					<a class="brand-logo" href="{{ URL::route('home') }}">{{ $app_name }}</a>
				</li>
			@endif
		</div>
		<div class="hide-on-large-only">
			@if (Auth::guest())
				<li class="bold">
					<a href="{{ URL::route('login') }}" class="waves-effect waves-teal">
						{{ Lang::get('navbar.login_btn') }}
					</a>
				</li>
				<li class="bold">
					<a href="{{ URL::route('signup') }}" class="waves-effect waves-teal">
						{{ Lang::get('navbar.signup_btn') }}
					</a>
				</li>
			@else
				<li class="bold">
					<a href="{{ URL::route('logout') }}">
						{{ Lang::get('navbar.logout_btn') }}
					</a>
				</li>
			@endif
		</div>

		@yield('menu')
	</ul>
</header>