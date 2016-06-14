@extends('layouts._form')

@section('breadcrumb')
	<a href="{{ URL::route('courses.index') }}" class="breadcrumb">
		{{ Lang::get('course.breadcrumb_name') }}
	</a>
	<a href="{{ URL::route('courses.show', $course->id) }}" class="breadcrumb">
		{{ $course->name }}
	</a>
	<a href="" class="breadcrumb">
		{{ Lang::get('course.edit_panel_title') }}
	</a>
@stop

@section('form_title')
	<h4>{{ Lang::get('course.edit_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::model($course, [
			'route' 	=> 	['courses.update', $course->id],
			'method'	=>	'patch',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}


		@include('courses.partials.fields')

		<!-- Boton de crear curso -->
		<button class="btn waves-effect waves-light col s12" type="submit" name="action">
			{{ Lang::get('course.edit_submit_btn') }}
		</button>
		<!-- /Boton de crear curso -->

	{!! Form::close() !!}
@stop