@extends('forms._form')

@section('breadcrumb')
	<a href="{{ URL::route('courses.index') }}">
		{{ Lang::get('course.breadcrumb_name') }}
	</a>
	<a href="{{ URL::route('courses.show', $course->id) }}">
		{{ $course->name }}
	</a>
	<a href="">
		{{ Lang::get('module.create_breadcrumb') }}
	</a>
@stop

@section('form_title')
	<h4>{{ Lang::get('module.create_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::open([
			'route' 	=> 	'modules.store',
			'method'	=>	'post',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}

		@include('forms._fields')

		<!-- Id del curso al que corresponde -->
		<input type="hidden" name="course_id" value="{{ $course->id }}">
		<!-- /Id del curso al que corresponde -->

		<!-- Boton de crear curso -->
		<button class="btn waves-effect waves-light col s12" type="submit" name="action">
			{{ Lang::get('module.create_submit_btn') }}
		</button>
		<!-- /Boton de crear curso -->

	{!! Form::close() !!}
@stop