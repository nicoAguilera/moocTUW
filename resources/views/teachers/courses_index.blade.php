@extends('layouts.master')

@section('menu')
	@include('teachers._menu')
@stop

@section('content')

	@section('breadcrumb')
		<a href="{{ URL::route('teachers.courses.index', $teacher->id) }}" class="breadcrumb">
			{{ trans('teachers.courses_index_breadcrumb') }}
		</a>
	@stop

	<section>
		<div class="container">
			
			<div class="row">
				<h3>{{ trans('teachers.courses_index_title') }}</h3>
				@if(count($courses) > 0)
					<ul>
						@foreach($courses as $course)
							<li>
								<a href="{{ URL::route('teachers.courses.show', [$teacher->id, $course->id]) }}">
									{{ $course->name }}
								</a>
							</li>
						@endforeach
					</ul>
				@else
					<p>{{trans('teachers.courses_index_without_courses')}}</p>
				@endif
			</div>

		</div>
	</section>

@stop