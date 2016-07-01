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

                <h3>{{ $question->statement }}</h3>

                <a href="{{ URL::route('options.create', [$teacher->id, $course->id, $module->id, $test->id, $question->id]) }}">
                    Agregar opción
                </a>

                <h4>Opciones</h4>
                <table>
                    @foreach($question->options as $option)
                    <tr>
                        <td>{{$option->answer}}</td>
                    </tr>
                    @endforeach
                </table>
        </section>
    </div>
@stop
