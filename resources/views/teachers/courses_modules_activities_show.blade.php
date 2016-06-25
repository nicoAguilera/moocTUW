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

        <a href="{{ URL::route('teachers.courses.modules.activities.show', [$teacher->id, $course->id, $module->id, $activity->id]) }}" class="breadcrumb">
            {{ $activity->title }}
        </a>
    @stop

    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>{{ $activity->title }}</h4>
                </div>
                <div class="col">
                    <a href="{{ URL::route('activities.edit', [$course->id, $module->id, $activity->id]) }}">
                        {{ Lang::get('activities.edit_call_to_action') }}
                    </a>                   
                </div>
            </div>

            <!-- Contenido de la actividad -->
            <div class="container-fluid">
                <div class="row">
                    Plantilla por defecto o editada
                </div>
            </div>

            <a href="">
                {{ Lang::get('activities.show_call_to_action_editor') }}
            </a>
            <!-- /Contenido de la actividad-->
        </div>
    </section>
    
@stop