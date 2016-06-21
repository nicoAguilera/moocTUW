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

		@include('auth.partials._fields_signup')

		<button type="submit" class="btn waves-effect waves-light col s12">
			{{ Lang::get('auth.signup_submit_btn') }}
		</button>
	{!! Form::close()!!}
	<a href="{{ URL::route('login') }}">{{ Lang::get('auth.login_call_to_action') }}</a>
@stop
