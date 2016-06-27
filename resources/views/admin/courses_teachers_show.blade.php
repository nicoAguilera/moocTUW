@extends('layouts.master')

@section('menu')
	@include('admin._menu')
@stop

@section('content')

	@section('breadcrumb')
		<!-- breadcrumb add_teachers_course -->
	    <a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
	        {{ Lang::get('admin.panel_admin_breadcrumb') }}
	    </a>

	    <a href="{{ URL::route('admin.courses.index') }}" class="breadcrumb">
	        {{ Lang::get('courses.index_breadcrumb') }}
	    </a>
	    
	    <a href="{{ URL::route('admin.courses.show', $course->id) }}" class="breadcrumb">
	        {{ $course->name }}
	    </a>

	    <a href="{{ URL::route('courses.teachers.add', $course->id) }}" class="breadcrumb">
	    	{{ Lang::get('admin.add_teachers_course_bradcrumb') }}
	    </a>
	    <!-- /breadcrumb add_teachers_course -->

	    <a href="{{ URL::route('admin.courses.teachers.show') }}" class="breadcrumb">
	    	{{ $teacher->name }}
	    </a>
	@stop

	<section>
		<div class="container">
			
			<div class="row">
				<h3>{{ $teacher->name }}</h3>
				<p>{{ $teacher->email }}</p>
				@if(!$teacher->courses->contains($course->id))
					<a href="{{ URL::route('courses.teachers.dictate', [$course->id, $teacher->id]) }}" class="waves-effect waves-light btn">
						{{ Lang::get('teachers.teacher_dictate_course_call_to_action') }}
					</a>
				@else
					<span>{{ Lang::get('admin.teacher_dictate_course') }}</span>
				@endif
			</div>

		</div>
	</section>

@stop