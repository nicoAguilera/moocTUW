@extends('layouts.master')

@section('contenido')
		<h3>Agregar un nuevo profesor</h3>
		@if(count($errors)>0)
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		<form action="{{action('TeacherController@store')}}" method="POST">
			<div class="input-field">
				<label for="nombreProfesor">Nombre</label>
				<input type="text" class="validate" id="nombreProfesor" name="name" maxlength="255" required="required" >
			</div>
			<div class="input-field">
				<label for="apellidoProfesor">Apellido</label>
				<input type="text" class="validate" id="apellidoProfesor" name="surname" maxlength="255" required="required">
			</div>
			<div class="input-field">
				<label for="email" data-error="wrong" data-success="right">Email</label>
				<input type="email" class="validate" id="email" name="email" maxlength="255" required="required">
			</div>
			<div class="input-field">
				<label for="password">Password</label>
				<input type="password" class="validate" id="password" name="password" maxlength="60" required="required">
			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="">
				<span class="flow-text">
					<button class="btn waves-effect waves-light col s12 l3 offset-l9" type="submit" name="action">Agregar
					    <i class="material-icons right">send</i>
					 </button>
				</span>
			</div>
		</form>
@stop