@extends('forms._form')

@section('menu')
	@include('admin._menu')
@stop

@section('breadcrumb')
	<a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
		{{ Lang::get('admin.breadcrumb_name') }}
	</a>
	<a href="{{ URL::route('courses.index') }}" class="breadcrumb">
		{{ Lang::get('course.breadcrumb_name') }}
	</a>
	<a href="" class="breadcrumb">
		{{ Lang::get('course.create_breadcrumb') }}
	</a>
@stop

@section('form_title')
	<h4>{{ Lang::get('course.create_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::open([
			'route' 	=> 	'courses.store',
			'method'	=>	'post',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}

		@include('forms._fields')

		<!-- Boton de crear curso -->
		<button class="btn waves-effect waves-light col s12" type="submit" name="action">
			{{ Lang::get('course.create_submit_btn') }}
		</button>
		<!-- /Boton de crear curso -->

	{!! Form::close() !!}
@stop