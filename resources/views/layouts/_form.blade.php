@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col s12 m8 l6 offset-m2 offset-l3">
			<div class="card">
				<div class="card-content">

					<!-- Titulo -->
					<h3 class="card-title">
						@yield('form_title')
					</h3>
					<!-- /Titulo -->

					<!-- Panel de errores -->
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							{!! Lang::get('auth.error_message_signup') !!}
						</div>
					@endif
					<!-- /Panel de errores -->

					<!-- Formulario -->
					<div class="row">
						@yield('form')
					</div>
					<!-- /Formulario -->

				</div>
				<!-- /card-content -->
			
			</div>
			<!-- /card -->
		
		</div>
		<!-- /col -->
	
	</div>
	<!-- /row -->

</div>
<!-- /container -->
@stop