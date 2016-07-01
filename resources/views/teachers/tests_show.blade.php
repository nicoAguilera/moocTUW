@extends('layouts.master')

@section('content')

    @section('breadcrumb')
        <!-- breadcrumb courses_modules_show -->
        <a href="{{ URL::route('teachers.courses.index', $teacher->id) }}" 
            class="breadcrumb">
            {{ trans('teachers.courses_index_breadcrumb') }}
        </a>

        <a href="{{ URL::route('teachers.courses.show', [$teacher->id, $course->id]) }}" 
            class="breadcrumb">
            {{ $course->name }}
        </a>

        <a href="{{ URL::route('teachers.courses.modules.show', [$teacher->id, $course->id, $module->id]) }}" class="breadcrumb">
            {{ $module->name }}
        </a>
        <!-- /breadcrumb courses_modules_show -->

        <a href="{{ URL::route('tests.show', [$teacher->id, $course->id, $module->id, $test->id]) }}" 
            class="breadcrumb">
            {{ $test->title }}
        </a>
    @stop

    <div class="container">
        <section class="title">
            <div class="row">
                <div class="col">
                    <h1>{{ $test->title }}</h1>
                </div>
                <div class="col">
                    <a href="{{ URL::route('tests.edit', [$course->id, $module->id, $test->id]) }}">
                        Editar título de evaluación
                    </a>                   
                </div>
            </div>
        </section>

        <section class="content">

        </section>
    </div>
@stop
