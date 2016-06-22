@extends('forms._form')

@section('menu')
	@include('admin._menu')
@stop

@section('breadcrumb')
	<!-- /breadcrumb add_teachers_course -->
    <a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
        {{ Lang::get('admin.breadcrumb_name') }}
    </a>

    <a href="{{ URL::route('admin.courses.index') }}" class="breadcrumb">
        {{ Lang::get('courses.index_breadcrumb') }}
    </a>
    
    <a href="{{ URL::route('admin.courses.show', $course->id) }}" class="breadcrumb">
        {{ $course->name }}
    </a>

    <a href="{{ URL::route('admin.courses.teachers.add', $course->id) }}" class="breadcrumb">
    	{{ Lang::get('admin.add_teachers_course_bradcrumb') }}
    </a>
    <!-- /breadcrumb add_teachers_course -->

    <a href="{{ URL::route('admin.courses.teachers.create', $course->id) }}" class="breadcrumb">
    	{{ Lang::get('admin.courses_teachers_create_breadcrumb') }}
    </a>
@stop

@section('form_title')
	<h4>{{ Lang::get('teachers.create_panel_title') }}</h4>
@stop

@section('form')
	{!! Form::open([
			'url' 		=> 	URL::route('teachers.store'),
			'method'	=>	'post', 
			'class'		=>	'col s12',
			'role'		=>	'search'
	]) !!}
			
		@include('auth.partials._fields_signup')

		<input type="hidden" name="courseId" value="{{$course->id}}">

		<button type="submit" class="btn waves-effect waves-light col s12">
			{{ Lang::get('teachers.create_submit_btn') }}
		</button>
	{!! Form::close()!!}
@stop