@extends('layouts.master')

@section('content')
<style type="text/css">
	/*.collection a.collection-item:not(.active):hover{
		background-color: #ffcdd2;
	}*/
</style>

<nav  class="indigo">
	<div class="container">
		<div class="nav-wrapper">
			<div class="row">
				<div class="col s12">
				    <a href="{{ URL::route('courses.index') }}" class="breadcrumb">
				        {{ Lang::get('course.breadcrumb_name') }}
				    </a>
				</div>
			</div>
		</div>
	</div>
</nav>

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