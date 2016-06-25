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

    <!-- Agregar actividad -->
    <a href="" class="breadcrumb">
    	{{ Lang::get('activities.create_breadcrumb_name') }}
    </a>
    <!-- Agregar actividad -->
@stop

@section('form_title')
	<h4>{!! Lang::get('activities.create_panel_title') !!}</h4>
@stop

@section('form')
	{!! Form::open([
			'route' 	=> 	['activities.store', $teacher->id, $course->id, $module->id],
			'method'	=>	'post',
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}

		<!-- Tipo de actividad -->
		<div class="">
			{!! Form::label('type', trans('teachers.type_activity_label')) !!}
			<select name="type">
		      	<option value="" disabled selected>Seleccionar</option>
				<option value="content">Contenido</option>
				<option value="test">Evaluación</option>
		    </select>

		    @if ($errors->has('type'))
				<p class="red-text text-darken-2">
					<i class="fa fa-exclamation-circle"></i>
					{{ $errors->first('type') }}
				</p>
			@endif
		</div>
		<!-- /Tipo de actividad -->

		<!-- Titulo de la actividad -->
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
		<!-- /Titulo de la actividad -->

		<!-- Id del modulo al que corresponde -->
		<input type="hidden" name="module_id" value="{{ $module->id }}">
		<!-- /Id del modulo al que corresponde -->

		<!-- Boton de crear actividad -->
		<button class="btn waves-effect waves-light col s12" type="submit">
			{{ Lang::get('activities.add_activity_btn')}}
		</button>
		<!-- /Boton de crear actividad -->

	{!! Form::close() !!}
@stop