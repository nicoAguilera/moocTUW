@extends('layouts.master')

@section('menu')
	@include('admin._menu')
@stop

@section('content')

	@section('breadcrumb')
		<!-- breadcrumb courses_show -->
	    <a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
	        {{ Lang::get('admin.breadcrumb_name') }}
	    </a>

	    <a href="{{ URL::route('admin.courses.index') }}" class="breadcrumb">
	        {{ Lang::get('courses.index_breadcrumb') }}
	    </a>
	    
	    <a href="{{ URL::route('admin.courses.show', $course->id) }}" class="breadcrumb">
	        {{ $course->name }}
	    </a>
	    <!-- /breadcrumb courses_show -->

	    <a href="{{ URL::route('admin.courses.teachers.add', $course->id) }}" class="breadcrumb">
	    	{{ Lang::get('admin.add_teachers_course_bradcrumb') }}
	    </a>
	@stop

	<section>
		<div class="container">
			<div class="row">
				<div class="col">
					<h3>{{ Lang::get('teachers.index_title') }}</h3>
				</div>
				<div class="col btn_add">
					<a href="{{ URL::route('admin.courses.teachers.create', $course->id) }}" class="waves-effect waves-light btn">
						{{ Lang::get('teachers.create_call_to_action') }}
					</a>
				</div>
			</div>
			

			<div class="listado_profesores">
				@foreach($teachers as $teacher)
					<div class="row">
						<a href="{{ URL::route('teachers.show', [$course->id, $teacher->id]) }}" class="">
							{{$teacher->name}}
						</a>

						@if(!$teacher->courses->contains($course->id))
						<a href="{{ URL::route('teachers.dictate', [$course->id, $teacher->id]) }}" class="waves-effect waves-teal btn-flat">
							{{ Lang::get('teachers.teacher_dictate_course_call_to_action') }}
						</a>
						@else
						<span>Profesor responsable</span>
						@endif
					</div>
				@endforeach
			</div>

			{!! str_replace('/?', '?', $teachers->render()) !!}
		</div>
	</section>

@stop