@extends('layouts.master')

@section('contenido')
<h3>{{$name}}</h3>

<label>Descripción: </label>{{$description}}<br>

<label>Fecha de Inicio: </label>{{$start_date}}<br>

<label>Fecha de finalización: </label>{{$end_date}}<br>

<a href="{{action('CourseController@create')}}" class="waves-effect waves-light btn">Crear nuevo curso</a>
<a href="{{action('CourseController@edit', $id)}}" class="waves-effect waves-light btn">Modificar datos del curso</a>
@stop