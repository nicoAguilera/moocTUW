@extends('forms._form')

@section('menu')
	@include('admin._menu')
@stop

@section('breadcrumb')
	<!-- breadcrumb admin/courses_show -->
	<a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
		{{ Lang::get('admin.panel_admin_breadcrumb') }}
	</a>
	<a href="{{ URL::route('admin.courses.index') }}" class="breadcrumb">
		{{ Lang::get('courses.index_breadcrumb') }}
	</a>
	<a href="{{ URL::route('admin.courses.show', $course->id) }}" class="breadcrumb">
		{{ $course->name }}
	</a>
	<!-- /breadcrumb admin/courses_show -->

	<a href="" class="breadcrumb">
		{{ Lang::get('courses.edit_panel_title') }}
	</a>
@stop

@section('form_title')
	<h4>{{ Lang::get('courses.edit_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::model($course, [
			'route' 	=> 	['admin.courses.update', $course->id],
			'method'	=>	'patch',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}


		@include('forms._fields')

		<!-- Boton de crear curso -->
		<button class="btn waves-effect waves-light col s12" type="submit" name="action">
			{{ Lang::get('courses.edit_submit_btn') }}
		</button>
		<!-- /Boton de crear curso -->

	{!! Form::close() !!}
@stop