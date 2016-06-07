@extends('layouts._showCourse')

@section('course_title')
    {{$course->name}}
@stop

@section('description')
    {{$course->description}}
@stop

@section('start_date')
    {{$course->start_date}}
@stop

@section('end_date')
    {{$course->end_date}}
@stop

@section('resource_title')
    {{ Lang::get('course.show_modules_title') }}
@stop

@section('resource_route')
    {{ URL::route('modules.create', $course->id) }}
@stop

@section('list')
    @foreach($course->modules as $module)
        <li>
            <a href="{{ URL::route('modules.show', [str_slug($course->name, '-'), $module->id]) }}">
                {{ $module->name }}
            </a>
        </li>
    @endforeach
@stop

@section('action')
    <a href="{{ URL::route('profesores.create') }}">
        {{ Lang::get('course.create_teacher_call_to_action') }}
    </a>
    <a href="{{ URL::route('courses.edit', $course->id) }}">
        {{ Lang::get('course.edit_call_to_action') }}
    </a>

    <a href="{{ URL::route('courses.create') }}" class="waves-effect waves-light btn">
        {{ Lang::get('course.create_call_to_action') }}
    </a>
@stop