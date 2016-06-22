@extends('layouts.master')


@section('menu')
    @if(Auth::check() && Auth::user()->role === 'admin' )
        @include('admin._menu')
    @endif
@stop


@section('breadcrumb')
    <!-- breadcrumb courses_index -->
    <a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
        {{ Lang::get('admin.breadcrumb_name') }}
    </a>

    <a href="{{ URL::route('admin.courses.index') }}" class="breadcrumb">
        {{ Lang::get('courses.index_breadcrumb') }}
    </a>
    <!-- /breadcrumb courses_index -->

    <a href="{{ URL::route('admin.courses.show', $course->id) }}" class="breadcrumb">
        {{ $course->name }}
    </a>
@stop


@section('content')
    <h4>{{$course->name}}</h4>



    {{$course->description}}



    {{$course->start_date}}



    {{$course->end_date}}


    <h5>Profesores</h5>
    @foreach($teachers as $teacher)
        <!-- Lo debería enlazar a los datos personales del profesor -->
        <p>{{$teacher->name}}</p>
    @endforeach

    <a href="{{ URL::route('admin.courses.teachers.add', $course->id) }}">
        {{ Lang::get('courses.add_teacher_call_to_action') }}
    </a>

    <a href="{{ URL::route('courses.edit', $course->id) }}">
        {{ Lang::get('courses.edit_call_to_action') }}
    </a>
@stop