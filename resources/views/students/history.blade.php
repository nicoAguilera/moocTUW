@extends('layouts.master')

@section('menu')
	@include('students._menu')
@stop

@section('content')

	@section('breadcrumb')
		<a href="{{ URL::route('students.history', $student->id) }}" class="breadcrumb">
			Historial
		</a>
	@stop

	<div class="container">
		<h1>Historial</h1>

		@foreach($student->enrolling as $course)
			<section class="course">

				<h3><a href="{{ URL::route('students.courses.show', [$student->id, $course->id]) }}">{{$course->name}}</a></h3>

				<ul>
					@foreach($course->modules as $module)
						<li>{{$module->name}}</li>
					@endforeach
				</ul>

			</section>
		@endforeach
	</div>

@stop