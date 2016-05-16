@extends('layouts.master')

@section('contenido')
<style type="text/css">
	.collection a.collection-item:not(.active):hover{
		background-color: #ffcdd2;
	}
</style>
<h3>Listado de cursos</h3>

<div class="collection">
@foreach($courses as $course)
	@if($course->active === 0)
	<a href="{{action('CourseController@show', $course['id'])}}" class="collection-item red-text text-darken-1">
		{{$course->name}}
	</a>
	@else
	<a href="{{action('CourseController@show', $course['id'])}}" class="collection-item green-text">
		{{$course->name}}
	</a>
	@endif
@endforeach
</div>

<a href="{{action('CourseController@create')}}">Crear nuevo curso</a>
@stop