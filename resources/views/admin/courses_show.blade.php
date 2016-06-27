@extends('layouts.master')


@section('menu')
    @include('admin._menu')
@stop


@section('breadcrumb')
    <!-- breadcrumb courses_index -->
    <a href="{{ URL::route('admin.panel_admin') }}" class="breadcrumb">
        {{ Lang::get('admin.panel_admin_breadcrumb') }}
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
    <div class="container">

        <section class="course">
            <h2>{{$course->name}}</h2>

            <h3>Descripción</h3>
            <p>{{$course->description}}</p>

            <h5>Fecha de inicio</h5>
            <p>{{$course->start_date}}</p>

            <h5>Fecha de finalización</h5>
            <p>{{$course->end_date}}</p>

            <a href="{{ URL::route('courses.edit', $course->id) }}">
                {{ Lang::get('courses.edit_call_to_action') }}
            </a>
        </section>

        <section class="teachers">
            <h3>Profesores</h3>
            <table>
            @foreach($teachers as $teacher)
                <!-- Lo debería enlazar a los datos personales del profesor -->
                <tr>
                    <td>{{$teacher->name}}</td>
                    <td>
                        <a href="{{ URL::route('teachers.destroy', [$course->id, $teacher->id]) }}">
                            {{ Lang::get('admin.courses_show_teachers_delete') }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </table>

            <a href="{{ URL::route('courses.teachers.add', $course->id) }}">
                {{ Lang::get('courses.add_teacher_call_to_action') }}
            </a>
        </section>

    </div>
@stop