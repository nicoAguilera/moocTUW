@extends('forms._form')

@section('menu')
	@include('admin._menu')
@stop

@include('admin._breadcrumb')

@section('form_title')
	<h4>{{ Lang::get('teachers.create_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::open([
			'url' 		=> 	URL::route('teachers.store'),
			'method'	=>	'post', 
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}
			
		@include('auth.partials._fields_signup_without_password_confirmation')

		<button type="submit" class="btn waves-effect waves-light col s12">
			{{ Lang::get('teachers.create_submit_btn') }}
		</button>
	{!! Form::close()!!}
@stop