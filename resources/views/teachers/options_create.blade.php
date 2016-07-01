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

    <a href="" class="breadcrumb">
    	{{ $test->title }}
    </a>

    <!-- Agregar pregunta -->
    <a href="" class="breadcrumb">
    	{{ $question->statement }}
    </a>
    <!-- Agregar pregunta -->

    <a href="" class="breadcrumb">
    	Agregar opción
    </a>
@stop

@section('form_title')
	<h4>Agregar opción</h4>
@stop

@section('form')
	{!! Form::open([
			'route' 	=> 	['options.store', $teacher->id, $course->id, $module->id, $test->id, $question->id],
			'method'	=>	'post',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}

		<!-- Respuesta -->
		<div class="input-field">
			{!! Form::label('answer', 'Respuesta') !!}
			{!! Form::text('answer', old('answer'), ['class' => 'validate']) !!}

			@if ($errors->has('answer'))
				<p class="red-text text-darken-2">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('answer') }}
				</p>
			@endif
		</div>
		<!-- /Respuesta -->

		<!-- Correcta -->


			@if ($errors->has('correct'))
				<p class="red-text text-darken-2">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('correct') }}
				</p>
			@endif
		<!-- /Correcta -->

		<!-- Id de la pregunta a la que corresponde -->
		<input type="hidden" name="question_id" value="{{ $question->id }}">
		<!-- /Id de la pregunta a la que corresponde -->

		<!-- Boton de crear evaluación -->
		<button class="btn waves-effect waves-light col s12" type="submit">
			CREAR OPCIÓN
		</button>
		<!-- /Boton de crear evaluación -->

	{!! Form::close() !!}
@stop