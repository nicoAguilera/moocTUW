@extends('layouts.master')

@section('menu')
	@include('admin._menu')
@stop

@section('content')

	@include('admin._breadcrumb')

	<section>
		<div class="container">
			
			<div class="row">
				<h3>{{ $teacher->name }}</h3>
				<p>{{ $teacher->email }}</p>
				<a class="waves-effect waves-light btn">{{ Lang::get('teachers.teacher_dictate_course_call_to_action') }}</a>
			</div>

		</div>
	</section>

@stop