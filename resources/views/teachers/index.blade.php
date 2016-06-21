@extends('layouts.master')

@section('menu')
	@include('admin._menu')
@stop

@section('content')

	@include('admin._breadcrumb')

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
				@foreach($teachers as $teacher)
					<div class="row">
						<a href="{{ URL::route('teachers.show', [$course->id, $teacher->id]) }}" class="">
							{{$teacher->name}}
						</a>
						<a class="waves-effect waves-teal btn-flat">{{ Lang::get('teachers.teacher_dictate_course_call_to_action') }}</a>
					</div>
				@endforeach
			</div>

			{!! str_replace('/?', '?', $teachers->render()) !!}
		</div>
	</section>

@stop