@extends('forms._form')

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

		<!-- Titulo de la actividad -->
		<div class="input-field">
			{!! Form::label('title', Lang::get('activity.create_name_label')) !!}
			{!! Form::text('title', old('title'), ['class' => 'validate']) !!}

			@if ($errors->has('title'))
				<p class="red-text text-darken-2">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('title') }}
				</p>
			@endif
		</div>
		<!-- /Titulo de la actividad -->

		<!-- Id del modulo al que corresponde -->
		<input type="hidden" name="module_id" value="{{ $module->id }}">
		<!-- /Id del modulo al que corresponde -->

		<!-- Boton de crear actividad -->
		<button class="btn waves-effect waves-light col s12" type="submit">
			{{ Lang::get('activity.add_activity_btn')}}
		</button>
		<!-- /Boton de crear actividad -->

	{!! Form::close() !!}
@stop