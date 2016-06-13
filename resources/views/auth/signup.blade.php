@extends('layouts._form')

@section('form_title')
	<h4>{{ Lang::get('auth.signup_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::open([
			'url' 		=> URL::route('signup'),
			'method'	=>'post', 
			'class'		=>'col s12',
	]) !!}

		<!-- Name -->
		<div class="input-field">
			{!! Form::label('name', Lang::get('auth.name_label')) !!}
			{!! Form::text('name', old('name'), [
				'class'			=> 'form-control',
				'maxlength'		=> Config::get('user.name_max_length'),
			]) !!}

			@if ($errors->has('name'))
				<p class="text-danger">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('name') }}
				</p>
			@endif
		</div>
		<!-- /Name -->

		<!-- Email -->
		<div class="input-field {{ $errors->has('name') ? 'has-error' : '' }}">
			{!! Form::label('email', Lang::get('auth.email_label')) !!}
			{!! Form::email('email', old('email'), [
				'class'			=> 'form-control',
				'maxlength'		=> Config::get('user.email_max_length'),
			]) !!}

			@if ($errors->has('email'))
				<p class="text-danger">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('email') }}
				</p>
			@endif
		</div>
		<!-- /Email -->

		<!-- Password -->
		<div class="input-field">
			{!! Form::label('password', Lang::get('auth.password_label')) !!}
			{!! Form::password('password', [
				'class'			=> 'form-control',
				'min'			=> Config::get('user.password_min_length'),
				'maxlength'		=> Config::get('user.password_max_length'),
			]) !!}

			@if ($errors->has('password'))
				<p class="text-danger">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('password') }}
				</p>
			@endif
		</div>
		<!-- /Password -->

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

		<button type="submit" class="btn waves-effect waves-light col s12 m6 offset-m6">
			{{ Lang::get('auth.signup_submit_btn') }}
		</button>
	{!! Form::close()!!}
	<a href="{{ URL::route('login') }}">{{ Lang::get('auth.login_call_to_action') }}</a>
@stop
