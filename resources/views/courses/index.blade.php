@extends('layouts.master')

@section('menu')
	@include('admin._menu')
@stop

@section('content')

	@section('breadcrumb')
		<a href="{{ URL::route('courses.index') }}" class="breadcrumb">
	        {{ Lang::get('course.breadcrumb_name') }}
	    </a>
	@stop

	<div class="container">
		<div class="card">
			<div class="card-content">
				<h3>{{ Lang::get('course.index_panel_title') }}</h3>

				<div class="collection">
				@foreach($courses as $course)
					@if($course->active === NULL)
					<a href="{{ URL::route('courses.show', $course['id']) }}" class="collection-item red-text text-darken-1">
						{{$course->name}}
					</a>
					@else
					<a href="{{ URL::route('courses.show', $course['id']) }}" class="collection-item green-text">
						{{$course->name}}
					</a>
					@endif
				@endforeach
				</div>

				<a href="{{ URL::route('courses.create') }}">{{ Lang::get('course.create_call_to_action') }}</a>
			</div>
		</div>
	</div>
@stop