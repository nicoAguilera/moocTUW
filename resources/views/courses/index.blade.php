@extends('layouts.master')

@section('content')
<style type="text/css">
	/*.collection a.collection-item:not(.active):hover{
		background-color: #ffcdd2;
	}*/
</style>

<div class="container">
	<div class="card">
		<div class="card-content">
			<h3>{{ Lang::get('course.index_panel_title') }}</h3>

			<div class="collection">
			@foreach($courses as $course)
				@if($course->active === NULL)
				<a href="{{ URL::route('cursos.show', $course['id']) }}" class="collection-item red-text text-darken-1">
					{{$course->name}}
				</a>
				@else
				<a href="{{ URL::route('cursos.show', $course['id']) }}" class="collection-item green-text">
					{{$course->name}}
				</a>
				@endif
			@endforeach
			</div>

			<a href="{{ URL::route('cursos.create') }}">{{ Lang::get('course.create_call_to_action') }}</a>
		</div>
	</div>
</div>
@stop