@extends('activities._panel_show')

@section('breadcrumb')
    <a href="{{ URL::route('courses.index') }}" class="breadcrumb">
        {{ Lang::get('course.breadcrumb_name') }}
    </a>
    <a href="{{ URL::route('courses.show', $course->id) }}" class="breadcrumb">
        {{ $course->name }}
    </a>
    <a href="{{ URL::route('modules.show', [$course->id, $module->id]) }}" class="breadcrumb">
        {{ $module->name }}
    </a>
    <a href="" class="breadcrumb">{{ $activity->title }}</a>
@stop

@section('title')
    <h4>{{ $activity->title }}</h4>
@stop

@section('action')
    <a href="{{ URL::route('activities.edit', [$course->id, $module->id, $activity->id]) }}">
        {{ Lang::get('activity.edit_call_to_action') }}
    </a>
    <a href="">
        {{ Lang::get('activity.show_call_to_action_editor') }}
    </a>
@stop