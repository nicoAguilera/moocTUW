@extends('layouts.master')

@section('content')

    @section('breadcrumb')
        <!-- breadcrumb students/modules_show -->
        <a href="{{ URL::route('home') }}" class="breadcrumb">
            Cursos
        </a>

        <a href="{{ URL::route('students.courses.show', [$student->id, $course->id]) }}" class="breadcrumb">
            {{ $course->name }}
        </a>

        <a href="{{ URL::route('students.modules.show', [$student->id, $course->id, $module->id]) }}" class="breadcrumb">
            {{ $module->name }}
        </a>
        <!-- /breadcrumb students/modules_show -->

        <a href="" class="breadcrumb">
            {{ $activity->title }}
        </a>
    @stop

    <div class="container">
        <section class="title">
            <div class="row">
                <h1>{{ $activity->title }}</h1>
            </div>
        </section>

        <section class="content">

            @if($activity->content === 0)
                @include('teachers._template_activity')
            @else
                {!!$activity->contents()->orderBy('created_at', 'desc')->first()->content!!}
            @endif

        </section>
    </div>
@stop
