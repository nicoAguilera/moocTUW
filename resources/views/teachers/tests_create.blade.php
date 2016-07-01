@extends('forms._form')

@section('menu')
	@include('teachers._menu')
@stop

@section('breadcrumb')
	<!-- Cursos -->
	<a href="{{ URL::route('teachers.courses.index', $teacher->id) }}" class="breadcrumb">
		{{ trans('teachers.courses_index_breadcrumb') }}
	</a>
	<!-- /Cursos -->

	<!-- Nombre del curso -->
    <a href="{{ URL::route('teachers.courses.show', [$teacher->id, $course->id]) }}" class="breadcrumb">
    	{{ $course->name }}
    </a>
    <!-- /Nombre del curso -->

    <!-- Nombre del modulo -->
    <a href="{{ URL::route('teachers.courses.modules.show', [$teacher->id, $course->id, $module->id]) }}" class="breadcrumb">
    	{{ $module->name }}
    </a>
    <!-- /Nombre del modulo -->

    <!-- Agregar evaluación -->
    <a href="" class="breadcrumb">
    	Agregar evaluación
    </a>
    <!-- Agregar evaluación -->
@stop

@section('form_title')
	<h4>Agregar evaluación</h4>
@stop

@section('form')
	{!! Form::open([
			'route' 	=> 	['tests.store', $teacher->id, $course->id, $module->id],
			'method'	=>	'post',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}

		<!-- Titulo de la evaluación -->
		<div class="input-field">
			{!! Form::label('title', trans('activities.create_name_label')) !!}
			{!! Form::text('title', old('title'), ['class' => 'validate']) !!}

			@if ($errors->has('title'))
				<p class="red-text text-darken-2">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('title') }}
				</p>
			@endif
		</div>
		<!-- /Titulo de la evaluación -->

		<!-- Id del modulo al que corresponde -->
		<input type="hidden" name="module_id" value="{{ $module->id }}">
		<!-- /Id del modulo al que corresponde -->

		<!-- Boton de crear evaluación -->
		<button class="btn waves-effect waves-light col s12" type="submit">
			CREAR EVALUACIÓN
		</button>
		<!-- /Boton de crear evaluación -->

	{!! Form::close() !!}
@stop