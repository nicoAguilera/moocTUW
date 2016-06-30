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

    <div class="container">
        <section class="title">
            <div class="row">
                <div class="col">
                    <h1>{{ $activity->title }}</h1>
                </div>
                <div class="col">
                    <a href="{{ URL::route('activities.edit', [$course->id, $module->id, $activity->id]) }}">
                        {{ Lang::get('activities.edit_call_to_action') }}
                    </a>                   
                </div>
            </div>
        </section>

        <section class="content">
            @if($activity->content === 0)
                <h3>Plantilla por defecto</h3>
                <a href="{{ URL::route('activities.edit.content', [$teacher->id, $course->id, $module->id, $activity->id]) }}">
                    {{ Lang::get('activities.show_call_to_action_editor') }}
                </a>
                @include('teachers._template_activity')
            @else
                {!!$activity->contents()->orderBy('created_at', 'desc')->first()->content!!}
            @endif

            <a href="{{ URL::route('activities.edit.content', [$teacher->id, $course->id, $module->id, $activity->id]) }}">
                {{ Lang::get('activities.show_call_to_action_editor') }}
            </a>
        </section>
    </div>
@stop