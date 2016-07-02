@extends('layouts.master')

@section('menu')
    @include('students._menu')
@stop

@section('content')

    @section('breadcrumb')
        <!-- breadcrumb students/courses_show -->
        <a href="{{ URL::route('home') }}" class="breadcrumb">
            Cursos
        </a>

        <a href="{{ URL::route('students.courses.show', [$student->id, $course->id]) }}" class="breadcrumb">
            {{ $course->name }}
        </a>
        <!-- /breadcrumb students/courses_show -->

        <a href="" class="breadcrumb">
            {{ $module->name }}
        </a>
    @stop

    <div class="container">
        <section class="module">
            <h3>{{ $module->name }}</h4>
        </section>

        <section class="activities">
            <div class="row">
                <div class="col">
                    <h4>{{ trans('modules.show_activities_title') }}</h4>
                </div>

            </div>

            <ul>
                @foreach($module->activities as $activity)
                    <li>
                        <a href="{{ URL::route('students.activities.show', [$student->id, $course->id, $module->id, $activity->id]) }}">
                            {{ $activity->title }}
                        </a>
                    </li>
                @endforeach
            </ul>

            
        </section>

        <section class="test">
            <h4>Evaluación</h4>

            @if($module->test != null)
                {{$module->test->title}}
            @endif
        </section>
    </div>

@stop
