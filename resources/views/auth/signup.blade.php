@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="card">
				<h2 class="card-header">{{ Lang::get('auth.signup_panel_title') }}</h2>
				<div class="card-block">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open([
							'url' 		=> URL::route('signup'),
							'method'	=>'post', 
							'class'		=>'form-horizontal', 
							'role'		=>'form'
					]) !!}

						<!-- Name -->
						<div class="md-form">
							{!! Form::label('name', 'Nombre') !!}
							{!! Form::text('name', old('name'), [
								'class'			=> 'form-control',
								//'placeholder'	=> '',
							]) !!}
						</div>
						<!-- /Name -->

						<div class="md-form">
							{!! Form::label('email', 'Dirección de Email') !!}
							{!! Form::email('email', old('email'), [
								'class'			=> 'form-control',
								//'placeholder'	=> '',
							]) !!}
						</div>

						<div class="md-form">
							{!! Form::label('password', 'Contraseña') !!}
							{!! Form::password('password', old('password'), [
								'class'			=> 'form-control',
								//'placeholder'	=> '',
							]) !!}
						</div>

						<div class="md-form">
							{!! Form::label('password_confirmation', 'Confirmar Contraseña') !!}
							{!! Form::password('password_confirmation', old('password'), [
								'class'			=> 'form-control',
								//'placeholder'	=> '',
							]) !!}
						</div>

						<div class="md-form">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-lg btn-block">
									Regístrate
								</button>
							</div>
						</div>
					{!! Form::close()!!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
