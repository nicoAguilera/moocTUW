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

        <a href="" class="breadcrumb">
            {{ $question->statement }}
        </a>
    @stop

    <div class="container">
        <section class="">

                <h1>{{ $question->statement }}</h1>

                <a href="{{ URL::route('questions.create', [$teacher->id, $course->id, $module->id, $test->id]) }}">
                    Agregar opción
                </a>

                <table>
                    @foreach($question->options as $option)
                    <tr>
                        <td><a href="{{ URL::route('questions.show') }}">{{$option->answer}}</a></td>
                    </tr>
                    @endforeach
                </table>
        </section>
    </div>
@stop
