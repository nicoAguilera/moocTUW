@extends('layouts.master')

@section('contenido')
		<h3>Nuevo curso</h3>
		@if(count($errors)>0)
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		<form action="{{action('CourseController@store')}}" method="POST">
			<div class="input-field">
				<label for="nombreCurso">Nombre</label>
				<input type="text" class="validate" id="nombreCurso" name="name">
			</div>
			<div class="input-field">
				<label for="descripcionCurso">Descripción</label>
				<input type="text" class="validate" id="descripcionCurso" name="description">
			</div>
			<label for="fecha_inicio">Fecha inicio</label>
			<div class="input-field">
				<input type="date" class="datepicker" id="fecha_inicio" name="start_date">
			</div>
			<label for="">Fecha finalización</label>
			<div class="input-field">
				<input type="date" class="datepicker" id="fecha_fin" name="end_date">
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<button class="btn waves-effect waves-light" type="submit" name="action">Submit
			    <i class="material-icons right">send</i>
			 </button>
		</form>
@stop