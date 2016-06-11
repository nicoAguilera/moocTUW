@extends('layouts._form')

@section('form_title')
	{{ Lang::get('module.create_panel_title') }}
@stop

@section('form')
	{!! Form::open([
			'route' 	=> 	'modules.store',
			'method'	=>	'post',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}

		<!-- Nombre -->
		<div class="input-field">
			{!! Form::label('name', Lang::get('course.create_name_label')) !!}
			{!! Form::text('name', old('name'), ['class' => 'validate']) !!}

			@if ($errors->has('name'))
				<p class="red-text text-darken-2">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('name') }}
				</p>
			@endif
		</div>
		<!-- /Nombre -->

		<!-- Descripción -->
		<div class="input-field">
			{!! Form::label('description', Lang::get('course.create_description_label')) !!}
			{!! Form::text('description', old('description'), ['class' => 'validate']) !!}
		</div>
		<!-- /Descripción -->

		<!-- Fecha de inicio -->
		{!! Form::label('start_date', Lang::get('course.create_start_date_label')) !!}
		<div class="input-field">
			{!! Form::text('start_date', Config::get('course.default_date')) !!}
		</div>
		<!-- /Fecha de inicio -->

		<!-- Fecha de finalización -->
		{!! Form::label('end_date', Lang::get('course.create_end_date_label')) !!}
		<div class="input-field">
			{!! Form::text('end_date', Config::get('course.default_date')) !!}
		</div>
		<!-- /Fecha de finalización -->

		<!-- Id del curso al que corresponde -->
		<input type="hidden" name="course_id" value="{{ $courseId }}">
		<!-- /Id del curso al que corresponde -->

		<!-- Boton de crear curso -->
		<button class="btn waves-effect waves-light col s12 m4 offset-m8" type="submit" name="action">
			{{ Lang::get('course.create_submit_btn') }}
		</button>
		<!-- /Boton de crear curso -->

	{!! Form::close() !!}
@stop