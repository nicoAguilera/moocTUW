@extends('forms._form')

@section('form_title')
	<h4>{{ Lang::get('auth.login_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::open([
			'url' 		=> URL::route('login'),
			'method'	=>'post',
			'class'		=>'col s12'
	]) !!}

		@include('auth.partials._fields_login')

		<!-- Remember me -->
		<input type="checkbox" class="filled-in" name="remember_me" id="remember_me" value="true">
		<label for="remember_me">{{ Lang::get('auth.remember_me_label') }}</label><br>
			@if ($errors->has('remember_me'))
				<p class="red-text text-darken-2">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('remember_me') }}
				</p>
			@endif
		<!-- /Remember me -->

		<!-- Boton para iniciar sesión -->
		<button type="submit" class="btn btn-primary col s12">
			{{ Lang::get('auth.login_btn') }}
		</button>
		<!-- /Boton para iniciar sesión -->

				<!--a class="waves-effect waves-teal btn-flat" href="{{ url('/password/email') }}">Forgot Your Password?</a-->
		
	{!! Form::close() !!}

	<!-- Enlace para registrarse -->
		<a href="{{ URL::route('signup') }}">
			{{ Lang::get('auth.signup_call_to_action') }}
		</a>
	<!-- Enlace para registrarse -->
@stop

