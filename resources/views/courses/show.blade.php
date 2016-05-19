@extends('layouts.master')

@section('contenido')
<div class="card">
    <div class="card-content">
        <span class="card-title">{{$name}}</span>
        <p>
            <label>Descripción: </label>{{$description}}<br>
			<label>Fecha de Inicio: </label>{{$start_date}}<br>
			<label>Fecha de finalización: </label>{{$end_date}}
		</p>
    </div>
    <div class="card-action">
        <a href="{{action('TeacherController@create')}}">Agregar profesores</a>
        <a href="{{action('CourseController@edit', $id)}}">Modificar datos del curso</a>
    </div>
</div>

<a href="{{action('CourseController@create')}}" class="waves-effect waves-light btn">
	Crear nuevo curso
</a>
@stop