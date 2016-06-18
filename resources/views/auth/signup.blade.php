@extends('forms._form')

@section('form_title')
	<h4>{{ Lang::get('auth.signup_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::open([
			'url' 		=>	URL::route('signup'),
			'method'	=>	'post', 
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}

		@include('auth.partials._fields_signup_without_password_confirmation')

		<!-- Password Confirmation -->
		<div class="input-field">
			{!! Form::label('password_confirmation', Lang::get('auth.password_confirmation_label')) !!}
			{!! Form::password('password_confirmation', [
				'class'			=> 'form-control',
				'maxlength'		=> Config::get('user.password_max_length'),
			]) !!}

			@if ($errors->has('password_confirmation'))
				<p class="text-danger">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('password_confirmation') }}
				</p>
			@endif
		</div>
		<!-- /Password Confirmation -->

		<button type="submit" class="btn waves-effect waves-light col s12">
			{{ Lang::get('auth.signup_submit_btn') }}
		</button>
	{!! Form::close()!!}
	<a href="{{ URL::route('login') }}">{{ Lang::get('auth.login_call_to_action') }}</a>
@stop
