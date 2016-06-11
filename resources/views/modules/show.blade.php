@extends('layouts._showCourse')

@section('breadcrumb')
    <a href="{{ URL::route('courses.index') }}" class="breadcrumb">
        {{ Lang::get('course.breadcrumb_name') }}
    </a>
    <a href="#!" class="breadcrumb">{{ $courseName }}</a>
    <a href="#!" class="breadcrumb">{{ $module->name }}</a>
@stop

@section('title')
    <h4>{{ $module->name }}</h4>
@stop

@section('description')
    {{$module->description}}
@stop

@section('start_date')
    {{$module->start_date}}
@stop

@section('end_date')
    {{$module->end_date}}
@stop

@section('resource_title')
    {{ Lang::get('module.show_activities_title') }}
@stop

@section('resource_route')
    {{ URL::route('activities.create', [10, $module->id]) }}
@stop

@section('list')
    @foreach($module->activities as $activity)
        <li>
            <a href="{{ URL::route('activities.show', [$module->id, $module->id]) }}">
                {{ $activity->name }}
            </a>
        </li>
    @endforeach
@stop

@section('action')
    <a href="{{ URL::route('modules.edit', $module->id) }}">
        {{ Lang::get('module.edit_call_to_action') }}
    </a>
@stop