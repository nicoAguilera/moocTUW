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
    	Agregar pregunta
    </a>
    <!-- Agregar pregunta -->
@stop

@section('form_title')
	<h4>Agregar pregunta</h4>
@stop

@section('form')
	{!! Form::open([
			'route' 	=> 	['questions.store', $teacher->id, $course->id, $module->id, $test->id],
			'method'	=>	'post',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}

		<!-- Enunciado -->
		<div class="input-field">
			{!! Form::label('statement', 'Enunciado') !!}
			{!! Form::text('statement', old('statement'), ['class' => 'validate']) !!}

			@if ($errors->has('statement'))
				<p class="red-text text-darken-2">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('statement') }}
				</p>
			@endif
		</div>
		<!-- /Enunciado -->

		<!-- Id del modulo al que corresponde -->
		<input type="hidden" name="test_id" value="{{ $test->id }}">
		<!-- /Id del modulo al que corresponde -->

		<!-- Boton de crear evaluación -->
		<button class="btn waves-effect waves-light col s12" type="submit">
			CREAR PREGUNTA
		</button>
		<!-- /Boton de crear evaluación -->

	{!! Form::close() !!}
@stop