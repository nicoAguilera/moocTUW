@extends('layouts.master')

@section('menu')
	@include('admin._menu')
@stop

@section('content')

	@section('breadcrumb')
		<!-- breadcrumb courses_show -->
	    <a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
	        {{ Lang::get('admin.panel_admin_breadcrumb') }}
	    </a>

	    <a href="{{ URL::route('admin.courses.index') }}" class="breadcrumb">
	        {{ Lang::get('courses.index_breadcrumb') }}
	    </a>
	    
	    <a href="{{ URL::route('admin.courses.show', $course->id) }}" class="breadcrumb">
	        {{ $course->name }}
	    </a>
	    <!-- /breadcrumb courses_show -->

	    <a href="{{ URL::route('courses.teachers.add', $course->id) }}" class="breadcrumb">
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
					<a href="{{ URL::route('teachers.create', $course->id) }}" class="waves-effect waves-light btn">
						{{ Lang::get('teachers.create_call_to_action') }}
					</a>
				</div>
			</div>
			

			<div class="listado_profesores">
				<table>
					@foreach($teachers as $teacher)
						<tr>
							<td>
								<a 	href="{{ URL::route('admin.courses.teachers.show', [$course->id, $teacher->id]) }}" 
									class="">
									{{$teacher->name}}
								</a>
							</td>
							@if(!$teacher->courses->contains($course->id))
								<td>
									<a 	href="{{ URL::route('courses.teachers.dictate', [$course->id, $teacher->id]) }}" 
										class="waves-effect waves-teal btn-flat">
										{{ Lang::get('teachers.teacher_dictate_course_call_to_action') }}
									</a>
								</td>
							@else
								<td>{{ Lang::get('admin.teacher_dictate_course') }}</td>
							@endif
						</tr>
					@endforeach
				</table>
			</div>

			{!! str_replace('/?', '?', $teachers->render()) !!}
		</div>
	</section>

@stop