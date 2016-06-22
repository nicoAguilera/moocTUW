@extends('layouts._showCourse')


@section('menu')
    @if(Auth::check() && Auth::user()->role === 'admin' )
        @include('admin._menu')
    @endif
@stop


@section('breadcrumb')
    @if(Auth::check() && Auth::user()->role === 'admin' )
        <a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
            {{ Lang::get('admin.breadcrumb_name') }}
        </a>
    @endif
    <a href="{{ URL::route('courses.index') }}" class="breadcrumb">
        {{ Lang::get('courses.index_breadcrumb') }}
    </a>
    <a href="" class="breadcrumb">{{ $course->name }}</a>
@stop


@section('title')
    <h4>{{$course->name}}</h4>
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
    {{ Lang::get('courses.show_modules_title') }}
@stop

@section('resource_route')
    {{ URL::route('modules.create', $course->id) }}
@stop

@section('list')
    @foreach($course->modules as $module)
        <li>
            <a href="{{ URL::route('modules.show', [$course->id, $module->id]) }}">
                {{ $module->name }}
            </a>
        </li>
    @endforeach
@stop

<h5>Profesores</h5>

@section('action')
    @if(Auth::check() && Auth::user()->role === 'admin')
    <a href="{{ URL::route('teachers.index', $course->id) }}">
        {{ Lang::get('courses.add_teacher_call_to_action') }}
    </a>
    @endif

    @if(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'teacher') )
    <a href="{{ URL::route('courses.edit', $course->id) }}">
        {{ Lang::get('courses.edit_call_to_action') }}
    </a>
    @endif
@stop