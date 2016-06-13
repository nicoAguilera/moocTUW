@extends('layouts._form')

@section('breadcrumb')
	<!-- Cursos -->
	<a href="{{ URL::route('courses.index') }}" class="breadcrumb">
		{{ Lang::get('course.breadcrumb_name') }}
	</a>
	<!-- /Cursos -->

	<!-- Nombre del curso -->
    <a href="{{ URL::route('courses.show', $course->id) }}" class="breadcrumb">
    	{{ $course->name }}
    </a>
    <!-- /Nombre del curso -->

    <!-- Nombre del modulo -->
    <a href="{{ URL::route('modules.show', [$course->id, $module->id]) }}" class="breadcrumb">
    	{{ $module->name }}
    </a>
    <!-- /Nombre del modulo -->

    <!-- Agregar actividad -->
    <a href="" class="breadcrumb">
    	{{ Lang::get('activity.create_breadcrumb_name') }}
    </a>
    <!-- Agregar actividad -->
@stop

@section('form_title')
	<h4>{!! Lang::get('activity.create_panel_title') !!}</h4>
@stop

@section('form')
	{!! Form::open([
			'route' 	=> 	'activities.store',
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

		<!-- Boton de crear actividad -->
		<button class="btn waves-effect waves-light col s12 m4 offset-m8" type="submit">
			{{ Lang::get('activity.add_activity_btn')}}
		</button>
		<!-- /Boton de crear actividad -->

	{!! Form::close() !!}
@stop