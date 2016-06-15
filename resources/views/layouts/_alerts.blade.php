<!-- alerts -->
@if(Session::has('alert'))
	<div class="container">

		@if(Session::has('alert.success'))
			<div class="card-panel green z-depth-2" role="alert">
				<span class="white-text">
					{{ Session::get('alert.success') }}
				</span>
			</div>
		@endif

		@if(Session::has('alert.info'))
			<div class="card-panel light-blue darken-1 z-depth-2" role="alert">
				<span class="white-text">
					{{ Session::get('alert.info') }}
				</span>
			</div>
		@endif

		@if(Session::has('alert.warning'))
			<div class="card-panel orange lighten-2 z-depth-2" role="alert">
				<span class="white-text">
					{{ Session::get('alert.warning') }}
				</span>
			</div>
		@endif

		@if(Session::has('alert.danger'))
			<div class="card-panel red darken-2 z-depth-2" role="alert">
				<span class="white-text">
					{{ Session::get('alert.danger') }}
				</span>
			</div>
		@endif

	</div>
@endif
<!-- /alerts -->