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
        <section class="">

                <h3>{{ $test->title }}</h3>

                <a href="{{ URL::route('questions.create', [$teacher->id, $course->id, $module->id, $test->id]) }}">
                    Agregar pregunta
                </a>

                <h4>Preguntas</h4>
                <table>
                    @foreach($test->questions as $question)
                        <tr>
                            <td>
                                <a href="{{ URL::route('questions.show', [$teacher->id, $course->id, $module->id, $test->id, $question->id]) }}">
                                    {{$question->statement}}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
        </section>

        <section class="content">

        </section>
    </div>
@stop
