@extends('forms._form')

@section('breadcrumb')
	<!-- breadcrumb courses_show -->
	<a href="{{ URL::route('teachers.courses.index', $teacher->id) }}" 
		class="breadcrumb">
		{{ trans('teachers.courses_index_breadcrumb') }}
	</a>

	<a href="{{ URL::route('teachers.courses.show', [$teacher->id, $course->id]) }}" 
		class="breadcrumb">
		{{ $course->name }}
	</a>
	<!-- /breadcrumb courses_show -->

	<a href="" class="breadcrumb">
		{{ trans('modules.create_breadcrumb') }}
	</a>
@stop

@section('form_title')
	<h4>{{ trans('modules.create_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::open([
			'route' 	=> 	['modules.store', $teacher->id, $course->id],
			'method'	=>	'post',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}

		<!-- Nombre -->
		<div class="input-field">
			{!! Form::label('name', Lang::get('courses.create_name_label')) !!}
			{!! Form::text('name', old('name'), ['class' => 'validate']) !!}

			@if ($errors->has('name'))
				<p class="red-text text-darken-2">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('name') }}
				</p>
			@endif
		</div>
		<!-- /Nombre -->

		<!-- Id del curso al que corresponde -->
		<input type="hidden" name="course_id" value="{{ $course->id }}">
		<!-- /Id del curso al que corresponde -->

		<!-- Boton de crear curso -->
		<button class="btn waves-effect waves-light col s12" type="submit" name="action">
			{{ trans('modules.create_submit_btn') }}
		</button>
		<!-- /Boton de crear curso -->

	{!! Form::close() !!}
@stop